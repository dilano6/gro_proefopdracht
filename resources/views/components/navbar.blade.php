<nav class="navbar">
    <img src="{{ asset('images/logo.svg') }}" class="logo">

    <div class="nav-links" id="navLinks">
        <a href="#">Operators</a>
        <a href="#">Content providers</a>
        <a href="#">Resources <img src="{{ asset('images/dropdown.svg') }}" class="dropdown-icon"></a>
        <a href="#">About us <img src="{{ asset('images/dropdown.svg') }}" class="dropdown-icon"></a>
    </div>

    <div class="menu-toggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.getElementById('navLinks').classList.toggle('active');
    }
</script>