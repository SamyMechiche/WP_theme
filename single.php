<?php get_header(); ?>

<main class="project-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <nav class="project-nav">
        <a href="<?php echo home_url(); ?>" class="back-home">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>
    </nav>

    <section class="project-hero">
        <h1 class="project-title"><?php the_title(); ?></h1>
        <?php if (get_field('subtitle')) : ?>
            <h2 class="project-subtitle"><?php the_field('subtitle'); ?></h2>
        <?php endif; ?>

        <?php if (get_field('github')) : ?>
        <div class="project-links">
            <a href="<?php the_field('github'); ?>" target="_blank" class="github-link">
                <i class="fab fa-github"></i>
                View on GitHub
            </a>
        </div>
        <?php endif; ?>
    </section>

    <section class="project-details">
        <div class="project-description">
            <h2>About the Project</h2>
            <?php the_content(); ?>

            <h2>Technologies Used</h2>
            <ul class="tech-stack">
                <?php
                $tags = get_the_tags();
                if ($tags) {
                    foreach ($tags as $tag) {
                        echo '<li>' . $tag->name . '</li>';
                    }
                }
                ?>
            </ul>

            <h2>Features</h2>
            <ul class="project-features">
                <?php
                // Récupérer les options sélectionnées du champ 'features'
                $features = get_field('features'); // Le nom du champ dans ACF

                if ($features) :
                    // Si des cases ont été sélectionnées, on les affiche
                    foreach ($features as $feature) :
                        echo '<li>' . esc_html($feature) . '</li>';
                    endforeach;
                else :
                    echo '<li>No features selected</li>'; // Message si aucune case n'a été sélectionnée
                endif;
                ?>
            </ul>
        </div>

        <?php if (get_field('video')) : ?>
            <div class="project-media">
                <video controls>
                    <source src="<?php the_field('video'); ?>" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture vidéo.
                </video>
            </div>
        <?php endif; ?>
    </section>

    <?php endwhile; endif; ?>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const elements = document.querySelectorAll(".project-hero, .project-description, .project-media");
        elements.forEach((el, index) => {
            el.style.opacity = "0";
            el.style.transform = "translateY(20px)";
            setTimeout(() => {
                el.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                el.style.opacity = "1";
                el.style.transform = "translateY(0)";
            }, index * 200);
        });
    });
</script>

<?php get_footer(); ?>
