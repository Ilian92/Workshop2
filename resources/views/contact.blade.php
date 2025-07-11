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
            <form class="space-y-6">
                <div>
                    <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom</label>
                    <input type="text" id="nom" name="nom" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-800 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
</x-layout> 