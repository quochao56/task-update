<footer class="bg-dark text-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <h3><i class="fa fa-leaf"></i> Iconic Locations</h3>
                <p>Explore breathtaking destinations around the world. Immerse yourself in nature's beauty.</p>
                <p>Contact us: <a href="mailto:info@iconiclocations.com" class="text-light">info@iconiclocations.com</a></p>
            </div>
            <div class="col-md-4">
                <h3><i class="fa fa-newspaper"></i> Recent Posts</h3>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="#" class="text-light d-flex align-items-center">
                            <img src="https://th.bing.com/th/id/OIP.k7dE2dftQijg3KbpTyIObAHaHa?w=199&h=199&c=7&r=0&o=5&pid=1.7"
                                 width="40" class="rounded-circle me-2">
                            <div class="article-title">Snapper Rocks Surfing</div>
                        </a>
                    </li>
                    <!-- Repeat similar structure for other recent posts -->
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center py-3 border-top">
        &copy; {{ date('Y') }} Iconic Locations. All rights reserved.
    </div>
</footer>

<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('footer.blade.php')
