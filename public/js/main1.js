class PhotoBooth {
            constructor() {
                this.video = document.getElementById('cameraVideo');
                this.canvas = document.getElementById('capturedCanvas');
                this.ctx = this.canvas.getContext('2d');
                this.stream = null;
                this.currentFrame = 'classic';
                this.currentEffect = 'none';
                this.facingMode = 'user';
                this.flashEnabled = false;
                this.gridEnabled = false;
                
                this.initializeEventListeners();
                this.initializeTabs();
            }

            initializeEventListeners() {
                // Open/Close Photo Booth
                document.getElementById('openPhotoBooth').addEventListener('click', () => this.openPhotoBooth());
                document.getElementById('tryPhotoBoothBtn').addEventListener('click', () => this.openPhotoBooth());
                document.getElementById('closePhotoBooth').addEventListener('click', () => this.closePhotoBooth());

                // Camera Controls
                document.getElementById('capturePhoto').addEventListener('click', () => this.capturePhoto());
                document.getElementById('switchCamera').addEventListener('click', () => this.switchCamera());
                document.getElementById('toggleFlash').addEventListener('click', () => this.toggleFlash());
                document.getElementById('toggleGrid').addEventListener('click', () => this.toggleGrid());

                // Photo Actions
                document.getElementById('retakePhoto').addEventListener('click', () => this.retakePhoto());
                document.getElementById('downloadPhoto').addEventListener('click', () => this.downloadPhoto());
                document.getElementById('sharePhoto').addEventListener('click', () => this.sharePhoto());

                // Effect Selection
                document.querySelectorAll('.effect-option').forEach(option => {
                    option.addEventListener('click', (e) => this.selectEffect(e.target.closest('.effect-option')));
                });

                // Frame Selection
                document.querySelectorAll('.frame-option').forEach(option => {
                    option.addEventListener('click', (e) => this.selectFrame(e.target.closest('.frame-option')));
                });

                // Close modal when clicking outside
                document.getElementById('photoBoothModal').addEventListener('click', (e) => {
                    if (e.target.id === 'photoBoothModal') {
                        this.closePhotoBooth();
                    }
                });

                // Keyboard shortcuts
                document.addEventListener('keydown', (e) => {
                    if (document.getElementById('photoBoothModal').style.display === 'block') {
                        switch(e.key) {
                            case ' ':
                            case 'Enter':
                                e.preventDefault();
                                this.capturePhoto();
                                break;
                            case 'Escape':
                                this.closePhotoBooth();
                                break;
                            case 'r':
                            case 'R':
                                if (document.getElementById('photoPreview').style.display === 'block') {
                                    this.retakePhoto();
                                }
                                break;
                        }
                    }
                });
            }

            initializeTabs() {
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const tabName = e.target.dataset.tab;
                        this.switchTab(tabName);
                    });
                });
            }

            switchTab(tabName) {
                // Remove active class from all tabs and content
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                // Add active class to selected tab and content
                document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
                document.getElementById(`${tabName}Tab`).classList.add('active');
            }

            async openPhotoBooth() {
                document.getElementById('photoBoothModal').style.display = 'block';
                document.body.style.overflow = 'hidden';
                
                try {
                    await this.initializeCamera();
                } catch (error) {
                    console.error('Error initializing camera:', error);
                    this.updateCameraStatus('Camera access denied or not available', 'error');
                }
            }

            closePhotoBooth() {
                document.getElementById('photoBoothModal').style.display = 'none';
                document.body.style.overflow = 'auto';
                
                if (this.stream) {
                    this.stream.getTracks().forEach(track => track.stop());
                    this.stream = null;
                }
                
                this.hidePreview();
            }

            async initializeCamera() {
                try {
                    this.updateCameraStatus('Requesting camera access...', 'warning');
                    
                    const constraints = {
                        video: {
                            facingMode: this.facingMode,
                            width: { ideal: 1280 },
                            height: { ideal: 720 }
                        },
                        audio: false
                    };

                    this.stream = await navigator.mediaDevices.getUserMedia(constraints);
                    this.video.srcObject = this.stream;
                    
                    this.video.onloadedmetadata = () => {
                        this.updateCameraStatus('Camera ready - Strike a pose!', 'success');
                    };

                } catch (error) {
                    console.error('Camera initialization error:', error);
                    this.updateCameraStatus('Unable to access camera. Please check permissions.', 'error');
                    throw error;
                }
            }

            selectEffect(option) {
                // Remove active class from all effects
                document.querySelectorAll('.effect-option').forEach(opt => opt.classList.remove('active'));
                
                // Add active class to selected effect
                option.classList.add('active');
                
                // Get effect name
                this.currentEffect = option.dataset.effect;
                
                // Apply effect to video
                this.applyVideoEffect();
            }

            applyVideoEffect() {
                const videoEffects = document.getElementById('videoEffects');
                const video = document.getElementById('cameraVideo');
                
                // Remove all effect classes from overlay
                videoEffects.className = 'video-effects';
                
                // Remove all effect classes from video
                video.className = '';
                
                // Apply current effect
                if (this.currentEffect !== 'none') {
                    // Try overlay method first
                    videoEffects.classList.add(`effect-${this.currentEffect}`);
                    
                    // Fallback: apply directly to video element
                    video.classList.add(`effect-${this.currentEffect}`);
                }
            }

            selectFrame(option) {
                // Remove active class from all frames
                document.querySelectorAll('.frame-option').forEach(opt => opt.classList.remove('active'));
                
                // Add active class to selected frame
                option.classList.add('active');
                
                // Get frame name
                this.currentFrame = option.dataset.frame;
                
                // Update frame overlay
                this.updateFrameOverlay();
            }

            updateFrameOverlay() {
                const frameOverlay = document.getElementById('frameOverlay');
                const frameBorder = frameOverlay.querySelector('.frame-border');
                const frameCorners = frameOverlay.querySelectorAll('.frame-corners');
                
                // Reset styles
                frameBorder.style.border = '4px solid #fff';
                frameCorners.forEach(corner => {
                    corner.style.border = '3px solid #ffd700';
                });
                
                // Apply frame-specific styles
                switch (this.currentFrame) {
                    case 'classic':
                        frameBorder.style.border = '4px solid #fff';
                        frameBorder.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.3)';
                        break;
                    case 'vintage':
                        frameBorder.style.border = '6px solid #8B4513';
                        frameBorder.style.boxShadow = '0 0 20px rgba(139, 69, 19, 0.5)';
                        frameCorners.forEach(corner => {
                            corner.style.border = '4px solid #D2691E';
                        });
                        break;
                    case 'modern':
                        frameBorder.style.border = '2px solid #333';
                        frameBorder.style.boxShadow = '0 0 30px rgba(0, 0, 0, 0.8)';
                        frameCorners.forEach(corner => {
                            corner.style.border = '2px solid #666';
                        });
                        break;
                    case 'party':
                        frameBorder.style.border = '5px solid #ff6b6b';
                        frameBorder.style.boxShadow = '0 0 25px rgba(255, 107, 107, 0.6)';
                        frameCorners.forEach(corner => {
                            corner.style.border = '4px solid #feca57';
                        });
                        break;
                    case 'polaroid':
                        frameBorder.style.border = '20px solid #fff';
                        frameBorder.style.borderBottom = '60px solid #fff';
                        frameBorder.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.3)';
                        frameCorners.forEach(corner => {
                            corner.style.display = 'none';
                        });
                        break;
                }
            }

            async switchCamera() {
                if (this.stream) {
                    this.stream.getTracks().forEach(track => track.stop());
                }
                
                this.facingMode = this.facingMode === 'user' ? 'environment' : 'user';
                
                try {
                    await this.initializeCamera();
                    this.updateCameraStatus(`Switched to ${this.facingMode === 'user' ? 'front' : 'back'} camera`, 'success');
                } catch (error) {
                    console.error('Error switching camera:', error);
                    this.updateCameraStatus('Error switching camera', 'error');
                }
            }

            toggleFlash() {
                this.flashEnabled = !this.flashEnabled;
                const flashBtn = document.getElementById('toggleFlash');
                
                if (this.flashEnabled) {
                    flashBtn.classList.add('active');
                    this.updateCameraStatus('Flash enabled', 'success');
                } else {
                    flashBtn.classList.remove('active');
                    this.updateCameraStatus('Flash disabled', 'success');
                }
            }

            toggleGrid() {
                this.gridEnabled = !this.gridEnabled;
                const gridBtn = document.getElementById('toggleGrid');
                const cameraFrame = document.querySelector('.camera-frame');
                
                if (this.gridEnabled) {
                    gridBtn.classList.add('active');
                    this.addGridOverlay(cameraFrame);
                    this.updateCameraStatus('Grid enabled', 'success');
                } else {
                    gridBtn.classList.remove('active');
                    this.removeGridOverlay(cameraFrame);
                    this.updateCameraStatus('Grid disabled', 'success');
                }
            }

            addGridOverlay(container) {
                if (container.querySelector('.grid-overlay')) return;
                
                const gridOverlay = document.createElement('div');
                gridOverlay.className = 'grid-overlay';
                gridOverlay.style.cssText = `
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    pointer-events: none;
                    z-index: 5;
                    background-image: 
                        linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px);
                    background-size: 33.33% 33.33%;
                `;
                container.appendChild(gridOverlay);
            }

            removeGridOverlay(container) {
                const gridOverlay = container.querySelector('.grid-overlay');
                if (gridOverlay) {
                    gridOverlay.remove();
                }
            }

            async showCountdown() {
                const countdown = document.getElementById('countdown');
                countdown.style.display = 'block';
                
                for (let i = 3; i > 0; i--) {
                    countdown.textContent = i;
                    await this.delay(1000);
                }
                
                countdown.textContent = 'Ketawa dong anjing';
                await this.delay(500);
                countdown.style.display = 'none';
            }

            flashEffect() {
                const flash = document.createElement('div');
                flash.style.cssText = `
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: white;
                    z-index: 15;
                    opacity: 0.9;
                    pointer-events: none;
                    animation: flashAnimation 0.3s ease-out;
                `;
                
                // Add flash animation keyframes
                if (!document.querySelector('#flashKeyframes')) {
                    const style = document.createElement('style');
                    style.id = 'flashKeyframes';
                    style.textContent = `
                        @keyframes flashAnimation {
                            0% { opacity: 0; }
                            50% { opacity: 0.9; }
                            100% { opacity: 0; }
                        }
                    `;
                    document.head.appendChild(style);
                }
                
                document.querySelector('.camera-frame').appendChild(flash);
                
                setTimeout(() => {
                    flash.remove();
                }, 300);
            }

            async capturePhoto() {
                if (!this.stream) return;

                // Disable capture button temporarily
                const captureBtn = document.getElementById('capturePhoto');
                captureBtn.disabled = true;

                try {
                    // Show countdown
                    await this.showCountdown();

                    // Flash effect
                    if (this.flashEnabled) {
                        this.flashEffect();
                    }

                    // Set canvas size to match video
                    this.canvas.width = this.video.videoWidth;
                    this.canvas.height = this.video.videoHeight;

                    // Save the current context state
                    this.ctx.save();

                    // Flip the canvas horizontally to correct the mirror effect
                    this.ctx.scale(-1, 1);
                    this.ctx.translate(-this.canvas.width, 0);

                    // Draw video frame to canvas (this will be flipped back to normal)
                    this.ctx.drawImage(this.video, 0, 0, this.canvas.width, this.canvas.height);

                    // Restore the context state
                    this.ctx.restore();

                    // Apply current effect to canvas
                    this.applyEffectToCanvas();

                    // Apply frame overlay to canvas
                    this.applyFrameToCanvas();

                    // Show preview
                    this.showPreview();

                    this.updateCameraStatus('Photo captured successfully!', 'success');
                } catch (error) {
                    console.error('Error capturing photo:', error);
                    this.updateCameraStatus('Error capturing photo', 'error');
                } finally {
                    // Re-enable capture button
                    captureBtn.disabled = false;
                }
            }

            applyEffectToCanvas() {
                if (this.currentEffect === 'none') return;

                const imageData = this.ctx.getImageData(0, 0, this.canvas.width, this.canvas.height);
                const data = imageData.data;

                switch (this.currentEffect) {
                    case 'sepia':
                        this.applySepiaEffect(data);
                        break;
                    case 'grayscale':
                        this.applyGrayscaleEffect(data);
                        break;
                    case 'invert':
                        this.applyInvertEffect(data);
                        break;
                    case 'vintage':
                        this.applyVintageEffect(data);
                        break;
                    case 'cool':
                        this.applyCoolEffect(data);
                        break;
                    case 'warm':
                        this.applyWarmEffect(data);
                        break;
                    case 'dramatic':
                        this.applyDramaticEffect(data);
                        break;
                    case 'dreamy':
                        this.applyDreamyEffect(data);
                        break;
                    case 'pop':
                        this.applyPopEffect(data);
                        break;
                    case 'noir':
                        this.applyNoirEffect(data);
                        break;
                    case 'saturate':
                        this.applySaturateEffect(data);
                        break;
                }

                this.ctx.putImageData(imageData, 0, 0);
            }

            applySepiaEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    const r = data[i];
                    const g = data[i + 1];
                    const b = data[i + 2];
                    
                    data[i] = Math.min(255, (r * 0.393) + (g * 0.769) + (b * 0.189));
                    data[i + 1] = Math.min(255, (r * 0.349) + (g * 0.686) + (b * 0.168));
                    data[i + 2] = Math.min(255, (r * 0.272) + (g * 0.534) + (b * 0.131));
                }
            }

            applyGrayscaleEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    const gray = data[i] * 0.299 + data[i + 1] * 0.587 + data[i + 2] * 0.114;
                    data[i] = gray;
                    data[i + 1] = gray;
                    data[i + 2] = gray;
                }
            }

            applyInvertEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    data[i] = 255 - data[i];
                    data[i + 1] = 255 - data[i + 1];
                    data[i + 2] = 255 - data[i + 2];
                }
            }

            applyVintageEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    const r = data[i];
                    const g = data[i + 1];
                    const b = data[i + 2];
                    
                    // Apply sepia first
                    data[i] = Math.min(255, (r * 0.393) + (g * 0.769) + (b * 0.189));
                    data[i + 1] = Math.min(255, (r * 0.349) + (g * 0.686) + (b * 0.168));
                    data[i + 2] = Math.min(255, (r * 0.272) + (g * 0.534) + (b * 0.131));
                    
                    // Reduce saturation and increase contrast
                    data[i] = Math.min(255, data[i] * 1.2);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.1);
                    data[i + 2] = Math.min(255, data[i + 2] * 0.8);
                }
            }

            applyCoolEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    data[i] = Math.max(0, data[i] - 20); // Reduce red
                    data[i + 1] = Math.min(255, data[i + 1] + 10); // Increase green
                    data[i + 2] = Math.min(255, data[i + 2] + 30); // Increase blue
                }
            }

            applyWarmEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    data[i] = Math.min(255, data[i] + 30); // Increase red
                    data[i + 1] = Math.min(255, data[i + 1] + 15); // Increase green
                    data[i + 2] = Math.max(0, data[i + 2] - 10); // Reduce blue
                }
            }

            applyDramaticEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Increase contrast
                    data[i] = data[i] > 128 ? Math.min(255, data[i] * 1.8) : Math.max(0, data[i] * 0.6);
                    data[i + 1] = data[i + 1] > 128 ? Math.min(255, data[i + 1] * 1.8) : Math.max(0, data[i + 1] * 0.6);
                    data[i + 2] = data[i + 2] > 128 ? Math.min(255, data[i + 2] * 1.8) : Math.max(0, data[i + 2] * 0.6);
                }
            }

            applyDreamyEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Soften and brighten
                    data[i] = Math.min(255, data[i] * 1.2);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.3);
                    data[i + 2] = Math.min(255, data[i + 2] * 1.1);
                }
            }

            applyPopEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Increase saturation and contrast
                    data[i] = Math.min(255, data[i] * 1.4);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.8);
                    data[i + 2] = Math.min(255, data[i + 2] * 1.4);
                }
            }

            applyNoirEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Convert to grayscale first
                    const gray = data[i] * 0.299 + data[i + 1] * 0.587 + data[i + 2] * 0.114;
                    
                    // Apply high contrast
                    const contrast = gray > 128 ? Math.min(255, gray * 1.5) : Math.max(0, gray * 0.5);
                    
                    data[i] = contrast;
                    data[i + 1] = contrast;
                    data[i + 2] = contrast;
                }
            }

            applySaturateEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Increase saturation
                    data[i] = Math.min(255, data[i] * 1.8);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.8);
                    data[i + 2] = Math.min(255, data[i + 2] * 1.8);
                }
            }

            applyFrameToCanvas() {
                const frameWidth = 20;
                const cornerSize = 30;
                
                this.ctx.save();
                
                switch (this.currentFrame) {
                    case 'classic':
                        this.drawClassicFrame(frameWidth, cornerSize);
                        break;
                    case 'vintage':
                        this.drawVintageFrame(frameWidth, cornerSize);
                        break;
                    case 'modern':
                        this.drawModernFrame(frameWidth, cornerSize);
                        break;
                    case 'party':
                        this.drawPartyFrame(frameWidth, cornerSize);
                        break;
                    case 'polaroid':
                        this.drawPolaroidFrame();
                        break;
                }
                
                this.ctx.restore();
            }

            drawClassicFrame(frameWidth, cornerSize) {
                // Draw white border
                this.ctx.strokeStyle = '#ffffff';
                this.ctx.lineWidth = 4;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw golden corners
                this.ctx.strokeStyle = '#ffd700';
                this.ctx.lineWidth = 3;
                this.drawCorners(cornerSize);
            }

            drawVintageFrame(frameWidth, cornerSize) {
                // Draw brown border
                this.ctx.strokeStyle = '#8B4513';
                this.ctx.lineWidth = 6;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw orange corners
                this.ctx.strokeStyle = '#D2691E';
                this.ctx.lineWidth = 4;
                this.drawCorners(cornerSize);
            }

            drawModernFrame(frameWidth, cornerSize) {
                // Draw dark border
                this.ctx.strokeStyle = '#333333';
                this.ctx.lineWidth = 2;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw gray corners
                this.ctx.strokeStyle = '#666666';
                this.ctx.lineWidth = 2;
                this.drawCorners(cornerSize);
            }

            drawPartyFrame(frameWidth, cornerSize) {
                // Draw colorful border
                this.ctx.strokeStyle = '#ff6b6b';
                this.ctx.lineWidth = 5;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw yellow corners
                this.ctx.strokeStyle = '#feca57';
                this.ctx.lineWidth = 4;
                this.drawCorners(cornerSize);
            }

            drawPolaroidFrame() {
                // Draw white polaroid border
                this.ctx.fillStyle = '#ffffff';
                
                // Top border
                this.ctx.fillRect(0, 0, this.canvas.width, 20);
                // Left border
                this.ctx.fillRect(0, 0, 20, this.canvas.height);
                // Right border
                this.ctx.fillRect(this.canvas.width - 20, 0, 20, this.canvas.height);
                // Bottom border (larger for polaroid effect)
                this.ctx.fillRect(0, this.canvas.height - 60, this.canvas.width, 60);
                
                // Add polaroid text
                this.ctx.fillStyle = '#666666';
                this.ctx.font = '16px Arial';
                this.ctx.textAlign = 'center';
                this.ctx.fillText('L-PhotoBooth', this.canvas.width / 2, this.canvas.height - 20);
            }

            drawCorners(cornerSize) {
                // Top-left corner
                this.ctx.beginPath();
                this.ctx.moveTo(10, 10 + cornerSize);
                this.ctx.lineTo(10, 10);
                this.ctx.lineTo(10 + cornerSize, 10);
                this.ctx.stroke();
                
                // Top-right corner
                this.ctx.beginPath();
                this.ctx.moveTo(this.canvas.width - 10 - cornerSize, 10);
                this.ctx.lineTo(this.canvas.width - 10, 10);
                this.ctx.lineTo(this.canvas.width - 10, 10 + cornerSize);
                this.ctx.stroke();
                
                // Bottom-left corner
                this.ctx.beginPath();
                this.ctx.moveTo(10, this.canvas.height - 10 - cornerSize);
                this.ctx.lineTo(10, this.canvas.height - 10);
                this.ctx.lineTo(10 + cornerSize, this.canvas.height - 10);
                this.ctx.stroke();
                
                // Bottom-right corner
                this.ctx.beginPath();
                this.ctx.moveTo(this.canvas.width - 10 - cornerSize, this.canvas.height - 10);
                this.ctx.lineTo(this.canvas.width - 10, this.canvas.height - 10);
                this.ctx.lineTo(this.canvas.width - 10, this.canvas.height - 10 - cornerSize);
                this.ctx.stroke();
            }

            showPreview() {
                const preview = document.getElementById('photoPreview');
                const previewImage = document.getElementById('previewImage');
                
                // Convert canvas to image
                const dataURL = this.canvas.toDataURL('image/jpeg', 0.9);
                previewImage.src = dataURL;
                
                // Show preview section
                preview.style.display = 'block';
                
                // Hide camera frame
                document.querySelector('.camera-frame').style.display = 'none';
                document.querySelector('.camera-controls').style.display = 'none';
                document.querySelector('.controls-section').style.display = 'none';
            }

            hidePreview() {
                const preview = document.getElementById('photoPreview');
                preview.style.display = 'none';
                
                // Show camera frame
                document.querySelector('.camera-frame').style.display = 'block';
                document.querySelector('.camera-controls').style.display = 'flex';
                document.querySelector('.controls-section').style.display = 'block';
            }

            retakePhoto() {
                this.hidePreview();
                this.updateCameraStatus('Ready to take another photo!', 'success');
            }

            downloadPhoto() {
                const canvas = this.canvas;
                const link = document.createElement('a');
                const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
                link.download = `L-PhotoBooth-${timestamp}.jpg`;
                link.href = canvas.toDataURL('image/jpeg', 0.9);
                link.click();
                
                this.updateCameraStatus('Photo downloaded successfully!', 'success');
            }

            async sharePhoto() {
                try {
                    const canvas = this.canvas;
                    
                    // Convert canvas to blob
                    canvas.toBlob(async (blob) => {
                        const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
                        const file = new File([blob], `L-PhotoBooth-${timestamp}.jpg`, {
                            type: 'image/jpeg'
                        });
                        
                        if (navigator.share && navigator.canShare && navigator.canShare({ files: [file] })) {
                            try {
                                await navigator.share({
                                    files: [file],
                                    title: 'L-PhotoBooth Photo',
                                    text: 'Check out this amazing photo from L-PhotoBooth! 📸'
                                });
                                this.updateCameraStatus('Photo shared successfully!', 'success');
                            } catch (error) {
                                if (error.name !== 'AbortError') {
                                    console.error('Error sharing:', error);
                                    this.fallbackShare();
                                }
                            }
                        } else {
                            this.fallbackShare();
                        }
                    }, 'image/jpeg', 0.9);
                } catch (error) {
                    console.error('Error preparing photo for sharing:', error);
                    this.fallbackShare();
                }
            }

            fallbackShare() {
                // Fallback: copy image data URL to clipboard or show share options
                const dataURL = this.canvas.toDataURL('image/jpeg', 0.9);
                
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(dataURL).then(() => {
                        this.updateCameraStatus('Photo data copied to clipboard!', 'success');
                    }).catch(() => {
                        this.showShareModal(dataURL);
                    });
                } else {
                    this.showShareModal(dataURL);
                }
            }

            showShareModal(dataURL) {
                // Create a simple share modal
                const modal = document.createElement('div');
                modal.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.8);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 2000;
                `;
                
                modal.innerHTML = `
                    <div style="background: white; padding: 20px; border-radius: 10px; max-width: 400px; text-align: center;">
                        <h3>Share Your Photo</h3>
                        <p>Right-click the image below and select "Save image as..." or "Copy image"</p>
                        <img src="${dataURL}" style="max-width: 100%; height: auto; border-radius: 5px; margin: 10px 0;">
                        <button onclick="this.parentElement.parentElement.remove()" style="padding: 10px 20px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer;">Close</button>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                // Close modal when clicking outside
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.remove();
                    }
                });
            }

            updateCameraStatus(message, type = 'info') {
                const statusElement = document.getElementById('cameraStatus');
                const icons = {
                    success: 'fas fa-check-circle',
                    error: 'fas fa-exclamation-circle',
                    warning: 'fas fa-exclamation-triangle',
                    info: 'fas fa-info-circle'
                };
                
                const colors = {
                    success: '#4CAF50',
                    error: '#f44336',
                    warning: '#ff9800',
                    info: '#2196F3'
                };
                
                statusElement.innerHTML = `<i class="${icons[type]}"></i> ${message}`;
                statusElement.style.color = colors[type];
                
                // Auto-hide status after 3 seconds for success messages
                if (type === 'success') {
                    setTimeout(() => {
                        statusElement.innerHTML = '<i class="fas fa-circle"></i> Camera ready - Strike a pose!';
                        statusElement.style.color = colors.info;
                    }, 3000);
                }
            }

            delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
        }

        // Initialize Photo Booth when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new PhotoBooth();
        });

        // Additional utility functions
        function initializeGalleryLightbox() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            galleryItems.forEach(item => {
                item.addEventListener('click', () => {
                    const img = item.querySelector('img');
                    const lightbox = document.createElement('div');
                    lightbox.className = 'lightbox';
                    lightbox.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.9);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        z-index: 1000;
                        cursor: pointer;
                    `;
                    
                    const lightboxImg = document.createElement('img');
                    lightboxImg.src = img.src;
                    lightboxImg.alt = img.alt;
                    lightboxImg.style.cssText = `
                        max-width: 90%;
                        max-height: 90%;
                        object-fit: contain;
                        border-radius: 10px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                    `;
                    
                    lightbox.appendChild(lightboxImg);
                    document.body.appendChild(lightbox);
                    
                    lightbox.addEventListener('click', () => {
                        lightbox.remove();
                    });
                });
            });
        }

        // Initialize gallery lightbox
        document.addEventListener('DOMContentLoaded', initializeGalleryLightbox);

        // Load more gallery functionality
        document.getElementById('loadMoreGallery').addEventListener('click', function() {
            const button = this;
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            button.disabled = true;
            
            // Simulate loading more images
            setTimeout(() => {
                const galleryGrid = document.querySelector('.gallery-grid');
                const newImages = [
                    {
                        src: '{{ asset("storage/image/orang1.jpeg") }}',
                        alt: 'Additional Wedding Photo',
                        category: 'wedding',
                        title: 'Wedding Memories',
                        description: 'More beautiful wedding moments'
                    },
                    {
                        src: '{{ asset("storage/image/orang2.jpeg") }}',
                        alt: 'Additional Corporate Photo',
                        category: 'corporate',
                        title: 'Corporate Success',
                        description: 'Professional team building'
                    }
                ];
                
                newImages.forEach((imgData, index) => {
                    const galleryItem = document.createElement('div');
                    galleryItem.className = 'gallery-item';
                    galleryItem.setAttribute('data-category', imgData.category);
                    galleryItem.setAttribute('data-aos', 'fade-up');
                    galleryItem.setAttribute('data-aos-delay', (index * 100).toString());
                    
                    galleryItem.innerHTML = `
                        <img src="${imgData.src}" alt="${imgData.alt}" loading="lazy">
                        <div class="gallery-overlay">
                            <h4>${imgData.title}</h4>
                            <p>${imgData.description}</p>
                        </div>
                    `;
                    
                    galleryGrid.appendChild(galleryItem);
                });
                
                // Reinitialize AOS for new elements
                AOS.refresh();
                
                // Reinitialize lightbox for new images
                initializeGalleryLightbox();
                
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Hide button after loading
                button.style.display = 'none';
            }, 1500);
        });

        // Performance monitoring
        window.addEventListener('load', function() {
            // Hide loading screen
            const loading = document.getElementById('loading');
            if (loading) {
                loading.style.opacity = '0';
                setTimeout(() => {
                    loading.style.display = 'none';
                }, 500);
            }

            // Log performance metrics
            if ('performance' in window) {
                const perfData = performance.timing;
                const loadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('Page load time:', loadTime + 'ms');
                
                // Send to analytics if needed
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'timing_complete', {
                        'name': 'load',
                        'value': loadTime
                    });
                }
            }
        });

        // Error tracking
        window.addEventListener('error', function(e) {
            console.error('JavaScript error:', e.error);
            
            // Send to error tracking service if needed
            if (typeof gtag !== 'undefined') {
                gtag('event', 'exception', {
                    'description': e.error.message,
                    'fatal': false
                });
            }
        });

        // Service Worker registration for PWA capabilities
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('ServiceWorker registration successful');
                    })
                    .catch(function(err) {
                        console.log('ServiceWorker registration failed: ', err);
                    });
            });
        }

        // Add to home screen prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            
            // Show install button or banner
            const installBanner = document.createElement('div');
            installBanner.innerHTML = `
                <div style="position: fixed; bottom: 20px; right: 20px; background: #667eea; color: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); z-index: 1000; max-width: 300px;">
                    <p style="margin: 0 0 10px 0; font-size: 14px;">Install L-PhotoBooth app for better experience!</p>
                    <button onclick="installApp()" style="background: white; color: #667eea; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; margin-right: 10px;">Install</button>
                    <button onclick="this.parentElement.parentElement.remove()" style="background: transparent; color: white; border: 1px solid white; padding: 8px 16px; border-radius: 5px; cursor: pointer;">Later</button>
                </div>
            `;
            document.body.appendChild(installBanner);
        });

        function installApp() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    }
                    deferredPrompt = null;
                });
            }
        }

        // testimonial slider
        class TestimonialsSlider {
    constructor() {
        this.currentSlide = 0;
        this.slides = document.querySelectorAll('.testimonial-item');
        this.dots = document.querySelectorAll('.testimonial-dots .dot');
        this.prevBtn = document.querySelector('.testimonial-prev');
        this.nextBtn = document.querySelector('.testimonial-next');
        
        this.init();
    }

    init() {
        if (this.slides.length === 0) return;
        
        this.setupEventListeners();
        this.setupTouchEvents();
        
        // Initialize first slide
        this.showSlide(0);
    }

    setupEventListeners() {
        // Previous button
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => {
                this.prevSlide();
            });
        }

        // Next button
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => {
                this.nextSlide();
            });
        }

        // Dot indicators
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                this.goToSlide(index);
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                this.prevSlide();
            } else if (e.key === 'ArrowRight') {
                this.nextSlide();
            }
        });
    }

    setupTouchEvents() {
        const slider = document.querySelector('.testimonials-slider');
        if (!slider) return;

        let startX = 0;
        let endX = 0;
        let startY = 0;
        let endY = 0;

        slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        }, { passive: true });

        slider.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
            endY = e.touches[0].clientY;
        }, { passive: true });

        slider.addEventListener('touchend', () => {
            const deltaX = startX - endX;
            const deltaY = startY - endY;
            
            // Only trigger if horizontal swipe is more significant than vertical
            if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > 50) {
                if (deltaX > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        }, { passive: true });
    }

    showSlide(index) {
        // Remove active class from all slides
        this.slides.forEach(slide => slide.classList.remove('active'));
        this.dots.forEach(dot => dot.classList.remove('active'));

        // Add active class to current slide
        if (this.slides[index]) {
            this.slides[index].classList.add('active');
        }
        
        if (this.dots[index]) {
            this.dots[index].classList.add('active');
        }

        this.currentSlide = index;
        
        // Add animation effect
        this.animateSlide(index);
    }

    animateSlide(index) {
        const slider = document.querySelector('.testimonials-slider');
        if (!slider) return;

        // Add fade effect
        slider.style.opacity = '0';
        
        setTimeout(() => {
            slider.style.opacity = '1';
        }, 150);
    }

    nextSlide() {
        const nextIndex = (this.currentSlide + 1) % this.slides.length;
        this.showSlide(nextIndex);
    }

    prevSlide() {
        const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.showSlide(prevIndex);
    }

    goToSlide(index) {
        if (index >= 0 && index < this.slides.length) {
            this.showSlide(index);
        }
    }

    // Public methods for external control
    destroy() {
        // Remove event listeners if needed
    }
}

// Initialize testimonials slider when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const testimonialsSlider = new TestimonialsSlider();
    
    // Make it globally accessible if needed
    window.testimonialsSlider = testimonialsSlider;
});