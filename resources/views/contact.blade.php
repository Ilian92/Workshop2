<x-layout title="Contact">
<section class="bg-gradient-to-br from-green-300 via-green-400 to-teal-400 relative overflow-hidden min-h-[70vh]">
    <div class="container mx-auto px-6 py-20 flex items-center justify-center">
        <div class="w-full max-w-lg bg-white bg-opacity-90 rounded-lg shadow-lg p-10 z-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight font-['Archivo_Black'] text-center">
                Contactez-nous
            </h1>
            <p class="text-gray-700 mb-8 text-lg text-center">
                Une question, une suggestion ? Remplissez le formulaire ci-dessous, nous vous répondrons rapidement !
            </p>
            <div x-data="{
                show: false,
                showError: false,
                nom: '',
                email: '',
                message: '',
                async submitForm() {
                    const response = await fetch('{{ route('contact.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            nom: this.nom,
                            email: this.email,
                            message: this.message
                        })
                    });
                    if (response.ok) {
                        this.show = true;
                        this.nom = '';
                        this.email = '';
                        this.message = '';
                        this.$nextTick(() => setTimeout(() => this.show = false, 2500));
                    } else {
                        this.showError = true;
                        this.$nextTick(() => setTimeout(() => this.showError = false, 2500));
                    }
                }
            }">
                <form class="space-y-6" @submit.prevent="submitForm()">
                    <div>
                        <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom</label>
                        <input type="text" id="nom" name="nom" x-model="nom" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" x-model="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" x-model="message" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-gray-800 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                            Envoyer
                        </button>
                    </div>
                </form>
                <div x-show="show" x-transition class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg px-8 py-6 border-2 border-green-400 flex flex-col items-center">
                        <svg class="w-12 h-12 text-green-500 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        <span class="text-lg font-semibold text-green-700">Votre message a bien été envoyé !</span>
                    </div>
                </div>
                <div x-show="showError" x-transition class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg px-8 py-6 border-2 border-red-400 flex flex-col items-center">
                        <svg class="w-12 h-12 text-red-500 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        <span class="text-lg font-semibold text-red-700">Une erreur est survenue, votre message n'a pas été envoyé.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-layout> 