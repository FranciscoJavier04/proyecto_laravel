<div id="deleteModal-{{ $id }}" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
    <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-lg font-bold">Confirmar Eliminación</h2>
        <p class="mb-4">{{ $message }}</p>
        <div class="flex justify-end">
            <button onclick="closeModal('{{ $id }}')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancelar</button>
            <form action="{{ $route }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded">Eliminar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById('deleteModal-' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('deleteModal-' + id).classList.add('hidden');
    }
</script>
