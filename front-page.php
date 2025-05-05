<?php 
wp_head(); // Include WordPress head function
get_header(); // Include the header template
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page | Samy Mechiche</title>
    <link rel="stylesheet" href="./assets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script> 
    <link rel="shortcut icon" href="./assets/img/favicone.png" type="image/x-icon">
</head>

<body>
<?php echo do_shortcode('[temoignages nombre=""]')?>
    <main>
        <section class="bg-1 ">
            <div class="particle"></div>
            <div class="frame uppercase white font-jetbrains font-size">
                <h1 id="welcome-text">welcome</h1>
                <div class='wave -one'></div>
                <div class='wave -two'></div>
                <div class='wave -three'></div>
            </div>

            <p class="white uppercase font-jetbrains swipe">swipe/scroll</p>
            <div class="arrow">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>

        <section class="presentation">
            <div class="left-side">
                <div class="h1-l">
                    <h1 class="uppercase">
                        who am i?
                    </h1>
                    <hr>
                </div>
                <p class="animate-on-scroll">
                    Hi there, i'm <mark>Samy Mechiche</mark>, a 22 years old junior web developer and currently
                    <mark>Open to Work</mark>. Welcome on my page ;)
                </p>
            </div>

            <div class="right-side">
                <div class="h1-r">
                    <h1 class="uppercase">
                        what do i do?
                    </h1>
                    <hr>
                </div>
                <p class="animate-on-scroll">
                    Mostly <mark>web development</mark>. I aim to build creative websites and explore new ways to
                    improve people's <mark>experience</mark> when visiting a website.
                </p>
            </div>
        </section>

        <section class="honeycomb">
            <h1 class="uppercase white font-jetbrains font-size">my tech stack</h1>
            <div class="honeycomb-grid">
                <div class="honeycomb-cell">
                    <i class="fab fa-css3-alt"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-html5"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-js"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-php"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-vuejs"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-symfony"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-python"></i>
                </div>
                <div class="honeycomb-cell">
                    <i class="fab fa-wordpress"></i>
                </div>
            </div>
        </section>

        <section class="work bg-2">
            <h1 class="uppercase font-jetbrains white font-size margin" id="work-title"></h1>
            <button class="raise font-jetbrains">dive in it</button>

            <div class="work">

            <div class="work-left">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $github_link = get_field('github_link');
                        $description = get_field('description_courte');
                        ?>
                        <div class="work-text">
                            <p class="white font-jetbrains">
                                <a href="<?php the_permalink(); ?>" class="project-link" target="_blank"><?php the_title(); ?> (🔗)</a>
                                <?php if ($github_link): ?>
                                    <a href="<?php echo esc_url($github_link); ?>" target="_blank">(🔗)</a>
                                <?php endif; ?>
                                <br>
                                <?php if (get_field('subtitle')) : ?>
                                    <h2 class="project-subtitle">- <a href="<?php the_permalink(); ?>" class="project-link" target="_blank"><?php the_field('subtitle'); ?></a></h2>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo "<p class='white'>Aucun projet publié pour le moment.</p>";
                endif;
                ?>
            </div>


                <div class="fil">
                </div>

                <div class="work-right">
                    <?php
                    $video_files = array(
                        'nihon.mp4',
                        'pygame.mp4',
                        'devaura.mp4',
                        'team_tasker.mp4',
                        'visit_konoha.mp4',
                        'filmora.mp4',
                    );

                    foreach ($video_files as $video_file) {
                        ?>
                        <figure class="figure">
                            <video src="<?php echo get_template_directory_uri(); ?>/assets/video/<?php echo $video_file; ?>" controls style="border: 2px solid rgba(0, 183, 255, 0.3); border-radius: 5px; width: 80%;"></video>
                        </figure>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </section>

        <section class="side-projects">
            <div class="left-side">
                <div class="h1-l">
                    <h1 class="uppercase white font-jetbrains">
                        my side projects
                    </h1>
                    <hr>
                </div>
            </div>

            <div class="content">
                <div class="video">
                    <figure class="diagonal-split">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/work/code.webp" alt="Développement Web" class="top-img">
                        <h3 class="white font-jetbrains">dev/video </h3>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/work/timeline.webp" alt="Montage Vidéo" class="bottom-img">
                    </figure>
                </div>

                <div class="text">
                    <p class="white font-jetbrains">Among my current <mark>development</mark> journey, I still am animated by a strong passion for video, especially <mark>editing</mark>.</p>
                </div>
            </div>

            <div class="left-side">
                <div class="h1-l">
                    <h1 class="uppercase white font-jetbrains">
                        here's a sample
                    </h1>
                    <hr>
                </div>
            </div>

            <div class="video-cinema">
                <iframe 
                    width="560" 
                    height="315" 
                    src="<?php echo get_template_directory_uri(); ?>/assets\video\v2 montage mastu.mp4" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>

            <div class="video-cinema">
                <iframe 
                    width="560" 
                    height="315" 
                    src="<?php echo get_template_directory_uri(); ?>/assets\video\projet teaser action.mp4" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>

            <div class="right-side">
                <div class="h1-r">
                    <h1 class="uppercase white font-jetbrains">
                        some soft skills
                    </h1>
                    <hr class="white">
                </div>
            </div>
            <div class="skills-container font-jetbrains">
                <div class="skill-cards">  
                  
                  <div class="skill-card">  
                    <div class="card-front">  
                      <span class="skill-icon">💡</span>  
                      <h3>Creativity</h3>  
                    </div>  
                    <div class="card-back">  
                      <p>I like to come-up with new ideas for a website, just like this portfolio design ;)</p>  
                    </div>  
                  </div>  
              
                  <div class="skill-card">  
                    <div class="card-front">  
                      <span class="skill-icon">🎬</span>  
                      <h3>Adaptability</h3>  
                    </div>  
                    <div class="card-back">  
                      <p>Thanks to what I've learnt during my filmmaking course, I've built a director's eye and a sharp attention to detail.</p>  
                    </div>  
                  </div>  

                  <div class="skill-card">  
                    <div class="card-front">  
                      <span class="skill-icon">🧐</span>  
                      <h3>Curiosity</h3>  
                    </div>  
                    <div class="card-back">  
                      <p>From JS to Python, to Docker or even PHP, I like to learn and explore new topics.</p>  
                    </div>  
                  </div>  

                  <div class="skill-card">  
                    <div class="card-front">  
                      <span class="skill-icon">💪</span>  
                      <h3>Perseverance</h3>  
                    </div>  
                    <div class="card-back">  
                      <p>Once I start something, I'm not satisfied until It's fully completed.</p>  
                    </div>  
                  </div>  

                </div>  
              </div>  
        </section>

        <section class="resume">
            <div class="left-side">
                <div class="h1-l">
                    <h1>My Journey</h1>
                </div>
            </div>
            <div class="timeline">
                <!-- Why I Love Cards -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h3>My Passions</h3>
                        <div class="passion-cards">
                            <div class="passion-card">
                                <i class="fas fa-code"></i>
                                <h4>Why I Love Coding</h4>
                                <p>Coding is my creative outlet where I can build solutions and bring ideas to life. I enjoy the challenge of problem-solving and the satisfaction of creating something from nothing.</p>
                            </div>
                            <div class="passion-card">
                                <i class="fas fa-film"></i>
                                <h4>Why I Love Editing</h4>
                                <p>Video editing allows me to tell stories and create emotional connections. I love the process of transforming raw footage into compelling visual narratives.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h3>My CV</h3>
                        <div class="cv-download">
                            <i class="fas fa-file-alt"></i>
                            <h4>Download My Resume</h4>
                            <p>Get a detailed overview of my skills, experience, and education in PDF format.</p>
                            <a href="http://localhost/wordpress/wp-content/uploads/2025/04/SAMY_MECHICHE_CV.pdf" download class="download-btn" target="_blank">
                                <i class="fas fa-download"></i>
                                Download CV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact">
            <div class="left-side">
            <div class="h1-l">
                <h1 class="uppercase white font-jetbrains">
                let's get in touch 
                </h1>
                <hr>
            </div>
            </div>

            <div class="social-hub">
            <div class="hub-center" id="hubTrigger">
              <p width="40" height="40" class="white font-jetbrains">#</p>
            </div>
            
            <div class="hub-branches">
              <a href="https://github.com/SamyMechiche" class="branch" id="branch1" target="_blank"><i class="fab fa-github"></i></a>
              <a href="https://www.linkedin.com/in/samy-mechiche-3918a51ab/" class="branch" id="branch2" target="_blank"><i class="fab fa-linkedin"></i></a>
              <a href="https://www.instagram.com/snedit.co/" class="branch" id="branch4" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            </div>

            <div class="contact-form">
            <form action="#" method="post" class="font-jetbrains">
                <fieldset>
                <legend class="white" id="contact-legend">Contact Form</legend>

                <label for="name" class="white">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                <label for="email" class="white">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="message" class="white">Message:</label>
                <textarea id="message" name="message" placeholder="Write your message here" rows="5" required></textarea>
                
                <button type="submit" class="raise font-jetbrains">Send Message</button>
                </fieldset>
            </form>
            </div>
        </section>

    </main

<?php
get_footer(); // Include the footer template
?>