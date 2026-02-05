@extends('layout')

@section('title', 'Daftar Kategori')

@section('content')
<div style="padding-top: 120px; padding-bottom: 3rem;">
  <div style="max-width: 1000px; margin: 0 auto; padding: 0 1rem;">
    
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
      <h1 style="font-size: 2rem; font-weight: 700; color: #000;">Daftar Kategori</h1>
      @if (Auth::check())
        
      @endif
    </div>

    <!-- SweetAlert Success replaced with script at bottom -->

    <!-- Categories Grid -->
    @if ($categories->count() > 0)
      <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem;">
        @foreach ($categories as $category)
          <div style="background: white; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(30, 9, 226, 0.1); overflow: hidden; transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 20px rgba(30, 9, 226, 0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(30, 9, 226, 0.1)'">
            
            <!-- Image / Header Kategori -->
            <div style="height: 180px; overflow: hidden; position: relative; background: #e9ecef;">
              @if ($category->image)
                <img src="{{ filter_var($category->image, FILTER_VALIDATE_URL) ? $category->image : asset('storage/' . $category->image) }}" 
                     alt="{{ $category->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 100%);"></div>
              @else
                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #1e09e2 0%, #6c5ce7 100%); display: flex; align-items: center; justify-content: center;">
                  <i data-feather="image" style="color: rgba(255,255,255,0.5); width: 48px; height: 48px;"></i>
                </div>
              @endif
              
              <div style="position: absolute; bottom: 0; left: 0; padding: 1.25rem; width: 100%;">
                 <h3 style="font-size: 1.4rem; font-weight: 700; margin: 0; color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">{{ $category->name }}</h3>
                 <p style="margin: 0; font-size: 0.85rem; color: rgba(255,255,255,0.9); display: flex; align-items: center; gap: 0.3rem;">
                    <i data-feather="package" style="width: 14px; height: 14px;"></i> {{ $category->products->count() }} Produk
                 </p>
              </div>
            </div>

            <!-- Content -->
            <div style="padding: 1.5rem;">
              <p style="color: #666; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1.5rem; min-height: 60px;">
                {{ $category->description ? Str::limit($category->description, 100) : 'Tidak ada deskripsi' }}
              </p>

              <!-- Actions -->
              @if (Auth::check() && Auth::user()->role === 'admin')
                <div style="display: flex; gap: 0.5rem;">
                  <a href="{{ route('categories.edit', $category) }}" 
                     style="flex: 1; background-color: #0dcaf0; color: white; padding: 0.5rem; border-radius: 0.3rem; font-size: 0.85rem; text-decoration: none; text-align: center; font-weight: 600; transition: 0.3s; display: inline-block;"
                     onmouseover="this.style.backgroundColor='#0bb5e3'"
                     onmouseout="this.style.backgroundColor='#0dcaf0'">
                    Edit
                  </a>
                  <form method="POST" action="{{ route('categories.destroy', $category) }}" style="flex: 1;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="delete-category-btn"
                            data-category-name="{{ $category->name }}"
                            style="width: 100%; background-color: #dc3545; color: white; padding: 0.5rem; border: none; border-radius: 0.3rem; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: 0.3s;"
                            onmouseover="this.style.backgroundColor='#c82333'"
                            onmouseout="this.style.backgroundColor='#dc3545'">
                      Hapus
                    </button>
                  </form>
                </div>
              @else
                <a href="{{ route('categories.show', $category) }}" 
                   style="display: block; width: 100%; background-color: #0dcaf0; color: white; padding: 0.5rem; border-radius: 0.3rem; font-size: 0.85rem; text-decoration: none; text-align: center; font-weight: 600; transition: 0.3s;"
                   onmouseover="this.style.backgroundColor='#0bb5e3'"
                   onmouseout="this.style.backgroundColor='#0dcaf0'">
                  Lihat Detail
                </a>
              @endif
            </div>

            <!-- Footer -->
            <div style="background-color: #f8f9fa; padding: 0.75rem 1.5rem; font-size: 0.85rem; color: #999;">
              Dibuat {{ $category->created_at->diffForHumans() }}
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div style="background: white; padding: 3rem; text-align: center; border-radius: 0.5rem; box-shadow: 0 2px 10px rgba(30, 9, 226, 0.1);">
        <div style="font-size: 3rem; margin-bottom: 1rem; color: #1e09e2;">
          <i data-feather="folder-plus"></i>
        </div>
        <p style="font-size: 1.1rem; color: #999; margin-bottom: 1.5rem;">Belum ada kategori.</p>
        @if (Auth::check() && Auth::user()->role === 'admin')
          <a href="{{ route('categories.create') }}" 
             style="background-color: #1e09e2; color: white; padding: 0.85rem 2rem; border-radius: 0.3rem; font-weight: 600; text-decoration: none; display: inline-block; transition: 0.3s;"
             onmouseover="this.style.backgroundColor='#1a07b8'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(30, 9, 226, 0.3)'"
             onmouseout="this.style.backgroundColor='#1e09e2'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
            Tambah Kategori Pertama
          </a>
        @endif
        </a>
      </div>
    @endif
  </div>
</div>

<script>
  feather.replace();

  // SweetAlert2 Toast for Success Message
  @if(session('success'))
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: '{{ session('success') }}'
    })
  @endif

  // SweetAlert2 for category deletion
  document.querySelectorAll('.delete-category-btn').forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const categoryName = this.dataset.categoryName;
      const form = this.closest('form');

      Swal.fire({
        title: 'Hapus Kategori?',
        html: `Apakah Anda yakin ingin menghapus kategori <br><strong>${categoryName}</strong>?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '🗑️ Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        focusCancel: true
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
</script>
@endsection
