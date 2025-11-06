  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresenSEE - Sistem Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#1e3a8a',
                        'navy-dark': '#1e40af',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
  <!-- Buat Sesi Content -->
                    <div id="buatSesiContent" class="p-8">
                        <div class="mb-8">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Buat Sesi Presensi</h1>
                            <p class="text-gray-600">Buat sesi presensi baru untuk kelas Anda</p>
                        </div>

                        <div class="max-w-2xl">
                            <div class="bg-white rounded-xl shadow-md p-8">
                                <form id="buatSesiForm">
                                    <!-- Mata Pelajaran -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                                            Mata Pelajaran
                                        </label>
                                        <input 
                                            type="text" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition"
                                            placeholder="Contoh: Matematika"
                                            required
                                        >
                                    </div>

                                    <!-- Kelas -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                                            Kelas
                                        </label>
                                        <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition">
                                            <option value="">Pilih Kelas</option>
                                            <option value="10A">10A</option>
                                            <option value="10B">10B</option>
                                            <option value="10C">10C</option>
                                            <option value="11A">11A</option>
                                            <option value="11B">11B</option>
                                            <option value="11C">11C</option>
                                            <option value="12A">12A</option>
                                            <option value="12B">12B</option>
                                            <option value="12C">12C</option>
                                        </select>
                                    </div>

                                    <!-- Tanggal -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                                            Tanggal
                                        </label>
                                        <input 
                                            type="date" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition"
                                            required
                                        >
                                    </div>

                                    <!-- Waktu Mulai & Selesai -->
                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div>
                                            <label class="block text-gray-700 text-sm font-semibold mb-2">
                                                Waktu Mulai
                                            </label>
                                            <input 
                                                type="time" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition"
                                                required
                                            >
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 text-sm font-semibold mb-2">
                                                Waktu Selesai
                                            </label>
                                            <input 
                                                type="time" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <!-- Catatan -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                                            Catatan (Opsional)
                                        </label>
                                        <textarea 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition"
                                            rows="3"
                                            placeholder="Tambahkan catatan untuk sesi ini..."
                                        ></textarea>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex gap-4">
                                        <button 
                                            type="submit" 
                                            class="flex-1 bg-navy hover:bg-navy-dark text-white font-semibold py-3 rounded-xl transition duration-200 shadow-md hover:shadow-lg"
                                        >
                                            Buat Sesi
                                        </button>
                                        <button 
                                            type="button"
                                            onclick="window.location.href='/'"
                                            class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition"
                                        >
                                            Batal
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
