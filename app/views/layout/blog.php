<?php
require_once '../../core/Config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ+Basic:wght@100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/blog.scss">
</head>

<body class="blog_body">
    <?php include 'header.php'; ?>
    <main class="blog_container">
        <section class="blog-container">

            <div class="blog-intro">
                <h1>Welcome to Our Book Blog</h1>
                <p>
                    Welcome to the BookStore Blog — a space created for readers, dreamers,
                    and lifelong learners. Here we share book recommendations, reading tips,
                    and ideas that help you discover your next favorite story.
                </p>
                <p>
                    Whether you enjoy fiction, technology, history, or fantasy adventures,
                    our goal is to inspire your reading journey and connect you with books
                    that expand your imagination and knowledge.
                </p>
            </div>

            <div class="blog-posts">

                <article class="blog-card">
                    <h2>How to Build a Daily Reading Habit</h2>
                    <span class="blog-category">Reading Tips</span>
                    <p>
                        Struggling to find time to read? Building a daily reading habit
                        doesn’t require hours of free time. Start with just 10 minutes a day,
                        create a comfortable reading environment, and replace small moments
                        of scrolling with meaningful pages.
                    </p>
                    <p>
                        Consistency matters more than speed. Over time, reading becomes a
                        natural part of your routine, helping you relax, learn, and grow.
                    </p>
                    <div class="extra">
                        <p>
                            Start by choosing books that genuinely interest you rather
                            than books you feel obligated to read. Create a dedicated
                            reading moment — morning coffee, commuting time, or before bed.
                        </p>
                        <p>
                            Keep a book nearby at all times. Replace small moments of
                            social media scrolling with reading. Over time, your brain
                            begins to associate reading with relaxation and enjoyment.
                        </p>
                        <p>
                            Tracking progress, setting realistic goals, and joining
                            reading communities can also help maintain motivation.
                        </p>
                    </div>
                    <div class="read-more">Read More</div>
                </article>


                <article class="blog-card">
                    <h2>Top 10 Books That Change the Way You See the World</h2>
                    <span class="blog-category">Book Recommendations</span>
                    <p>
                        Some books entertain us — others transform how we think.
                        From philosophical classics to modern masterpieces, certain
                        stories challenge perspectives and inspire new ways of seeing life.
                    </p>
                    <p>
                        In this list, we explore powerful books that expand cultural,
                        emotional, and intellectual horizons, leaving a lasting impact
                        long after the final page.
                    </p>
                    <div class="extra">
                        <p>
                            Books like <strong>1984</strong>, <strong>Sapiens</strong>,
                            and <strong>Brave New World</strong> encourage readers to
                            question reality, technology, and historical narratives.
                        </p>
                        <p>
                            These works expand empathy and critical thinking by exposing
                            readers to unfamiliar ideas and perspectives.
                        </p>
                        <p>
                            Reading transformative literature helps develop deeper
                            awareness of global issues and personal values, making
                            reading both educational and deeply personal.
                        </p>
                    </div>
                    <div class="read-more">Read More</div>
                </article>


                <article class="blog-card">
                    <h2>Why Fiction Improves Creativity and Empathy</h2>
                    <span class="blog-category">Psychology of Reading</span>
                    <p>
                        Reading fiction is more than entertainment. Studies show that
                        engaging with stories strengthens empathy by allowing readers
                        to experience different perspectives and emotions.
                    </p>
                    <p>
                        Fiction also enhances creativity by stimulating imagination,
                        problem-solving skills, and emotional understanding — making
                        it one of the most powerful tools for personal development.
                    </p>
                    <div class="extra">
                        <p>
                            When reading stories, the brain simulates real social
                            experiences. This strengthens emotional intelligence and
                            helps readers better understand others’ motivations.
                        </p>
                        <p>
                            Fiction also enhances creativity by encouraging imagination,
                            abstract thinking, and problem-solving skills.
                        </p>
                        <p>
                            Regular fiction readers often demonstrate improved empathy,
                            communication abilities, and openness to new ideas.
                        </p>
                    </div>
                    <div class="read-more">Read More</div>
                </article>

            </div>

        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="<?= BASE_URL ?>public/assets/js/blog.js"></script>
</body>

</html>