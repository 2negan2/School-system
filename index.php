<?php
require_once 'config/db.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to School Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-white text-gray-800">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center gap-2">
                        <i class="fas fa-graduation-cap text-indigo-600 text-3xl"></i>
                        <span class="font-bold text-xl tracking-tight text-gray-900">SCHOOL<span class="text-indigo-600">OS</span></span>
                    </a>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Home</a>
                        <a href="#about" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">About</a>
                        <a href="#academics" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Academics</a>
                        <a href="#admissions" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Admissions</a>
                        <a href="#contact" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="dashboard" class="text-gray-500 hover:text-indigo-600 font-medium text-sm">Dashboard</a>
                        <a href="auth/logout.php" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition">Logout</a>
                    <?php else: ?>
                        <a href="auth/login.php" class="text-gray-500 hover:text-indigo-600 font-medium text-sm">Login</a>
                        <a href="apply.php" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-md">Apply Now</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Empowering the</span>
                            <span class="block text-indigo-600 xl:inline">Next Generation</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Join a community dedicated to academic excellence, innovation, and character development. Your future starts here.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="apply.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Apply for Admission
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#about" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="Students learning">
        </div>
    </div>

    <!-- Features / About -->
    <div id="about" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Why Choose Us</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    A Better Way to Learn
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    We provide a comprehensive educational experience that goes beyond textbooks.
                </p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Expert Faculty</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Learn from experienced educators who are passionate about their subjects and your success.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Modern Facilities</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            State-of-the-art labs, libraries, and digital resources to support your learning journey.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <i class="fas fa-futbol"></i>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Extracurriculars</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            A wide range of clubs, sports, and activities to help you grow outside the classroom.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <i class="fas fa-users"></i>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Community</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Be part of a supportive and diverse community that values every individual.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-gray-400 text-sm">123 School Lane, Education City</p>
                    <p class="text-gray-400 text-sm">Phone: +1 234 567 890</p>
                    <p class="text-gray-400 text-sm">Email: info@school.edu</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#about" class="hover:text-white">About</a></li>
                        <li><a href="#admissions" class="hover:text-white">Admissions</a></li>
                        <li><a href="auth/login.php" class="hover:text-white">Login</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <form class="flex gap-2">
                        <input type="email" placeholder="Your email" class="bg-gray-700 text-white px-3 py-2 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <button class="bg-indigo-600 px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center text-sm text-gray-400">
                &copy; <?= date('Y') ?> School Management System. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>