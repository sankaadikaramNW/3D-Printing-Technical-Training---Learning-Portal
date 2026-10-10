/**
 * FDM 3D PRINTER TECHNICAL PORTAL - MAIN JAVASCRIPT
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Keyboard Shortcut for Global Search (Ctrl + K or Cmd + K)
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            const searchInput = document.getElementById('global-search-input');
            const searchModal = document.getElementById('global-search-modal');
            if (searchModal) {
                searchModal.classList.remove('hidden');
                setTimeout(() => searchInput?.focus(), 50);
            }
        }
    });

    // 2. Smooth Tooltip & Copy G-Code Snippets
    document.querySelectorAll('[data-copy]').forEach(btn => {
        btn.addEventListener('click', () => {
            const textToCopy = btn.getAttribute('data-copy');
            navigator.clipboard.writeText(textToCopy).then(() => {
                const origText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check text-emerald-400 mr-1"></i> Copied!';
                setTimeout(() => {
                    btn.innerHTML = origText;
                }, 2000);
            });
        });
    });

    // 3. Volumetric Flow Rate & Print Time Interactive Calculator
    const calcForm = document.getElementById('print-flow-calculator');
    if (calcForm) {
        const layerHeightInput = document.getElementById('calc-layer-height');
        const lineWidthInput = document.getElementById('calc-line-width');
        const printSpeedInput = document.getElementById('calc-print-speed');
        const outputQ = document.getElementById('calc-output-flow');
        const outputStatus = document.getElementById('calc-output-status');

        function updateFlowCalculation() {
            const h = parseFloat(layerHeightInput?.value || 0.2);
            const w = parseFloat(lineWidthInput?.value || 0.4);
            const v = parseFloat(printSpeedInput?.value || 60);

            const q = (h * w * v).toFixed(2);
            if (outputQ) outputQ.textContent = `${q} mm³/s`;

            if (outputStatus) {
                if (q <= 11) {
                    outputStatus.className = 'text-xs font-semibold px-2 py-1 rounded bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 inline-block';
                    outputStatus.textContent = 'Safe Operational Zone (V6 Standard Hotend OK)';
                } else if (q <= 15) {
                    outputStatus.className = 'text-xs font-semibold px-2 py-1 rounded bg-amber-500/20 text-amber-400 border border-amber-500/40 inline-block';
                    outputStatus.textContent = 'High Flow Threshold (Requires Volcano / CHT Nozzle)';
                } else {
                    outputStatus.className = 'text-xs font-semibold px-2 py-1 rounded bg-rose-500/20 text-rose-400 border border-rose-500/40 inline-block';
                    outputStatus.textContent = 'Flow Overflow Hazard (Under-extrusion & Stepper Skip Risk)';
                }
            }
        }

        [layerHeightInput, lineWidthInput, printSpeedInput].forEach(inp => {
            inp?.addEventListener('input', updateFlowCalculation);
        });
        updateFlowCalculation();
    }
});

// Lightbox Global Function
window.openLightbox = function(imageUrl, title, caption) {
    let modal = document.getElementById('lightbox-modal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'lightbox-modal';
        modal.className = 'fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/90 backdrop-blur-md transition-opacity duration-300';
        modal.innerHTML = `
            <div class="relative max-w-5xl w-full max-h-[90vh] flex flex-col items-center bg-slate-900 border border-slate-700 rounded-2xl overflow-hidden shadow-2xl p-2">
                <button onclick="window.closeLightbox()" class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-slate-800/80 hover:bg-slate-700 text-white flex items-center justify-center transition-all border border-slate-600">
                    <i class="fas fa-times"></i>
                </button>
                <div class="w-full flex-1 flex items-center justify-center overflow-hidden max-h-[75vh] p-2">
                    <img id="lightbox-img" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
                </div>
                <div class="p-4 w-full text-center border-t border-slate-800 bg-slate-900/90">
                    <h4 id="lightbox-title" class="text-lg font-bold text-white font-heading"></h4>
                    <p id="lightbox-caption" class="text-sm text-slate-400 mt-1"></p>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) window.closeLightbox();
        });
    }

    document.getElementById('lightbox-img').src = imageUrl;
    document.getElementById('lightbox-title').textContent = title || 'Technical Documentation Image';
    document.getElementById('lightbox-caption').textContent = caption || '';
    modal.classList.remove('hidden');
};

window.closeLightbox = function() {
    const modal = document.getElementById('lightbox-modal');
    if (modal) modal.classList.add('hidden');
};
