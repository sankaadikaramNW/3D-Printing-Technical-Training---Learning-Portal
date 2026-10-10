<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-4 py-1.5 rounded-full bg-cyan-500/20 text-cyan-300 font-semibold text-xs tracking-wider uppercase inline-block mb-4 border border-cyan-500/30">
            Institutional Support & Inquiries
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">Contact Technical Training Team</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-base sm:text-lg">
            Have questions regarding the FDM 3D printer hardware, training modules, research collaboration, or workshop scheduling? Reach out below.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Contact Information (1 Col) -->
        <div class="space-y-8">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-200 space-y-6">
                <h3 class="text-xl font-bold text-brand-navy border-b border-slate-100 pb-3">Department Details</h3>
                
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-lg flex-shrink-0">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <strong class="text-slate-800 text-sm block">Training Facility:</strong>
                        <p class="text-slate-500 text-xs leading-relaxed mt-1">
                            Aeronautical Research & Development Wing (ARDW) / Technical Training Wing, SLAF Base Katunayake, Sri Lanka.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg flex-shrink-0">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <strong class="text-slate-800 text-sm block">Email Inquiries:</strong>
                        <p class="text-slate-500 text-xs leading-relaxed mt-1">
                            training.3dprinting@portal.edu.lk<br>
                            rd.engineering@slaf.gov.lk
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg flex-shrink-0">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <strong class="text-slate-800 text-sm block">Operating Hours:</strong>
                        <p class="text-slate-500 text-xs leading-relaxed mt-1">
                            Monday – Friday: 0800 hrs to 1600 hrs<br>
                            Training Lab: By Appointment
                        </p>
                    </div>
                </div>
            </div>

            <!-- Training Lab Advisory -->
            <div class="bg-gradient-to-br from-brand-navy to-slate-900 rounded-3xl p-6 text-white text-sm space-y-3 shadow-md">
                <div class="flex items-center gap-2 text-cyan-400 font-bold">
                    <i class="fas fa-shield-alt"></i> Institutional Access Note
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    Physical access to the 3D printer fabrication lab requires prior institutional authorization and completion of the Level 1 Safety Induction Module.
                </p>
            </div>
        </div>

        <!-- Contact Form (2 Cols) -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-slate-200">
                <h3 class="text-2xl font-bold text-brand-navy mb-2">Send a Message</h3>
                <p class="text-slate-500 text-sm mb-8">Fill in your inquiry details and our technical officers will respond promptly.</p>

                <form action="<?= base_url('contact') ?>" method="POST" class="space-y-6">
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 uppercase mb-2">Full Name *</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required 
                                   placeholder="e.g., Trainee Officer S. Silva" 
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white transition">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 uppercase mb-2">Email Address *</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required 
                                   placeholder="e.g., trainee@slaf.gov.lk" 
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-xs font-bold text-slate-700 uppercase mb-2">Phone / Intercom</label>
                            <input type="text" 
                                   id="phone" 
                                   name="phone" 
                                   placeholder="e.g., +94 11 234 5678" 
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white transition">
                        </div>

                        <div>
                            <label for="subject" class="block text-xs font-bold text-slate-700 uppercase mb-2">Inquiry Topic *</label>
                            <select id="subject" 
                                    name="subject" 
                                    required 
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white transition">
                                <option value="Training Module Inquiry">Training Module Inquiry</option>
                                <option value="FDM Hardware / Calibration Assistance">FDM Hardware / Calibration Assistance</option>
                                <option value="Project Fabrication Request">Project Fabrication Request</option>
                                <option value="Curriculum & Workshop Scheduling">Curriculum & Workshop Scheduling</option>
                                <option value="General Technical Question">General Technical Question</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-xs font-bold text-slate-700 uppercase mb-2">Your Message *</label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="5" 
                                  required 
                                  placeholder="Provide detailed information regarding your inquiry..." 
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white transition"></textarea>
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-brand-navy hover:bg-cyan-600 text-white font-bold rounded-xl transition duration-200 shadow-sm flex items-center justify-center gap-2">
                        <span>Submit Message</span>
                        <i class="fas fa-paper-plane text-xs"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
