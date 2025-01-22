<footer class="footer">
    <div class="footer-logo">
        <img src="{{ asset('img/readtechblacklogo.png') }}" alt="Logo ReadBlogTech" />
    </div>
    <div class="footer-links">
        <a href="{{ route('accueil') }}" class="footer-link">Accueil</a>
        <div class="footer-link-categories">
            <p class="footer-link">Catégories</p>
            <div class="categories-list">
                @foreach ($categories as $category)
                    <a href="{{ route('categorie.show', ['id' => $category->id]) }}" class="category">{{ $category->nom }}</a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('evenement.show') }}" class="footer-link">Événements</a>
    </div>
    <hr class="footer-divider" />
    <div class="footer-bottom">
        <p class="footer-copyright">© 2025 ReadTechBlog</p>
        <div class="footer-social-icons">
            <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="https://youtube.com" target="_blank" class="social-icon"><i class="fab fa-youtube"></i></a>
            <a href="https://linkedin.com" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</footer>
