@extends('layout')

@section('title', 'Login')

@section('content')
<div style="padding-top: 120px; min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
  <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 2px 10px rgba(30, 9, 226, 0.1); width: 100%; max-width: 400px;">
    <h2 style="margin-bottom: 1.5rem; text-align: center; color: #000; font-size: 1.8rem; font-weight: 600;">Login</h2>

    @if ($errors->any())
      <div style="background-color: #f8d7da; color: #721c24; padding: 0.75rem; border-radius: 0.3rem; margin-bottom: 1rem; border: 1px solid #f5c6cb;">
        @foreach ($errors->all() as $error)
          <p style="margin: 0; font-size: 0.9rem;">{{ $error }}</p>
        @endforeach
      </div>
    @endif

    @if (session('success'))
      <div style="background-color: #d4edda; color: #155724; padding: 0.75rem; border-radius: 0.3rem; margin-bottom: 1rem; border: 1px solid #c3e6cb;">
        <p style="margin: 0; font-size: 0.9rem;">{{ session('success') }}</p>
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div style="margin-bottom: 1.5rem;">
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #000;">Email</label>
        <input type="email" name="email" class="form-control" 
               style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 0.3rem; font-size: 1rem; font-family: 'Poppins', sans-serif;"
               value="{{ old('email') }}" required>
      </div>

      <div style="margin-bottom: 2rem;">
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #000;">Password</label>
        <div style="position: relative;">
          <input type="password" name="password" id="password" class="form-control" 
                 style="width: 100%; padding: 0.75rem; padding-right: 2.5rem; border: 1px solid #ddd; border-radius: 0.3rem; font-size: 1rem; font-family: 'Poppins', sans-serif;"
                 required>
          <button type="button" onclick="togglePassword('password', this)" 
                  style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #666; padding: 0.25rem;" 
                  title="Show/Hide Password">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
          </button>
        </div>
      </div>

      <button type="submit" 
              style="width: 100%; padding: 0.75rem; background-color: #1e09e2; color: white; border: none; border-radius: 0.3rem; font-size: 1rem; font-weight: 600; cursor: pointer; transition: 0.3s; font-family: 'Poppins', sans-serif;"
              onmouseover="this.style.backgroundColor='#1a07b8'"
              onmouseout="this.style.backgroundColor='#1e09e2'">
        Login
      </button>
    </form>

    <p style="margin-top: 1.5rem; text-align: center; color: #666; font-size: 0.95rem;">
      Belum punya akun? <a href="{{ route('register') }}" style="color: #1e09e2; font-weight: 600; text-decoration: none;">Daftar di sini</a>
    </p>
  </div>
</div>

<script>
function togglePassword(fieldId, button) {
  const field = document.getElementById(fieldId);
  const isPassword = field.type === 'password';
  field.type = isPassword ? 'text' : 'password';
  
  // Toggle icon
  const svg = button.querySelector('svg');
  if (isPassword) {
    // Eye-off icon
    svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
  } else {
    // Eye icon
    svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
  }
}
</script>
@endsection
