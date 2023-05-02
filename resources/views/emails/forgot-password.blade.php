<div>
    <img src="https://mahameru.wonosobokab.go.id/assets/images/logo.png" style="height:64px" alt="">
    <p style="font-size: 1.3rem; margin-bottom: 0px"><strong>MAHAMERU</strong></p>
    <p style="margin: 0; line-height: 1; font-size: .8rem; white-space: pre-wrap;">Manajemen Arsip Hasil Alih Media Baru</p>
</div>
<br>
<p>Halo, {{ $user->name }}.</p>
<p>Berikut adalah link <em>reset password</em> akun Anda di Apps MAHAMERU.</p>
<p><a href="{{ route('reset-password', ['token' => $token ]) }}">{{ route('reset-password', ['token' => $token ]) }}</a></p>
<p>Klik atau <em>copy - paste</em> link tersebut di browser Anda. Lalu masukkan password baru Anda.</p>
<br>
<p style="color: red">Perhatian!</p>
<p>Jika Anda tidak merasa ingin reset password, harap abaikan email ini.</p>
<br>
<p>Hormat kami,</p>
<p>Admin MAHAMERU</p>
