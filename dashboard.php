<?php
/******************************************************************
 * School Management System - Modern Dashboard
 * Designed for High Performance & UI Competitions
 ******************************************************************/

require_once 'config/db.php';

// 2. Fetch Real-Time Stats
$student_count = $conn->query("SELECT COUNT(*) as count FROM students")->fetch_assoc()['count'] ?? 0;
$staff_count   = $conn->query("SELECT COUNT(*) as count FROM staff")->fetch_assoc()['count'] ?? 0;
$class_count   = $conn->query("SELECT COUNT(*) as count FROM classes")->fetch_assoc()['count'] ?? 0;
$user_count    = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'] ?? 0;
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col overflow-hidden relative">
            
            <?php include 'includes/topbar.php'; ?>

            <!-- DASHBOARD CONTENT -->
            <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-8">
                
                <!-- STATS CARDS -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Students Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300 group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Students</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2 group-hover:text-indigo-600 transition-colors"><?php echo number_format($student_count); ?></h3>
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                <i class="fas fa-user-graduate text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-green-500 font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> 12% <span class="text-gray-400 ml-2 font-normal">vs last month</span>
                        </div>
                    </div>

                    <!-- Staff Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300 group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Staff</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2 group-hover:text-purple-600 transition-colors"><?php echo number_format($staff_count); ?></h3>
                            </div>
                            <div class="p-3 bg-purple-50 rounded-xl text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                                <i class="fas fa-chalkboard-teacher text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-400">
                            <span class="text-green-500 font-medium">Active</span> <span class="ml-2">Currently employed</span>
                        </div>
                    </div>

                    <!-- Classes Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300 group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Active Classes</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2 group-hover:text-orange-600 transition-colors"><?php echo number_format($class_count); ?></h3>
                            </div>
                            <div class="p-3 bg-orange-50 rounded-xl text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-colors">
                                <i class="fas fa-layer-group text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-orange-500 font-medium">
                            <i class="fas fa-clock mr-1"></i> Morning <span class="text-gray-400 ml-2 font-normal">& Afternoon</span>
                        </div>
                    </div>

                    <!-- Users Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300 group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">System Users</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2 group-hover:text-pink-600 transition-colors"><?php echo number_format($user_count); ?></h3>
                            </div>
                            <div class="p-3 bg-pink-50 rounded-xl text-pink-600 group-hover:bg-pink-600 group-hover:text-white transition-colors">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-400">
                            <span class="text-gray-800 font-medium">All Roles</span> <span class="ml-2">included</span>
                        </div>
                    </div>
                </div>

                <!-- CHARTS SECTION -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Chart -->
                    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-lg font-bold text-gray-800">Attendance Analytics</h4>
                            <select class="bg-gray-50 border-none text-sm text-gray-500 rounded-lg p-2 focus:ring-0 cursor-pointer hover:bg-gray-100">
                                <option>This Week</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                        <div class="h-72 w-full">
                            <canvas id="mainChart"></canvas>
                        </div>
                    </div>

                    <!-- Recent Activity / Notifications -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-6">Quick Actions</h4>
                        <div class="space-y-4">
                            <button class="w-full flex items-center p-3 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:text-indigo-600 transition group">
                                <div class="w-10 h-10 rounded-lg bg-white shadow-sm flex items-center justify-center text-gray-500 group-hover:text-indigo-600"><i class="fas fa-user-plus"></i></div>
                                <div class="ml-4 text-left">
                                    <p class="text-sm font-bold text-gray-800">Register Student</p>
                                    <p class="text-xs text-gray-400">Add new admission</p>
                                </div>
                            </button>
                            
                            <button class="w-full flex items-center p-3 rounded-xl bg-gray-50 hover:bg-purple-50 hover:text-purple-600 transition group">
                                <div class="w-10 h-10 rounded-lg bg-white shadow-sm flex items-center justify-center text-gray-500 group-hover:text-purple-600"><i class="fas fa-file-alt"></i></div>
                                <div class="ml-4 text-left">
                                    <p class="text-sm font-bold text-gray-800">Generate Report</p>
                                    <p class="text-xs text-gray-400">Academic performance</p>
                                </div>
                            </button>

                            <button class="w-full flex items-center p-3 rounded-xl bg-gray-50 hover:bg-orange-50 hover:text-orange-600 transition group">
                                <div class="w-10 h-10 rounded-lg bg-white shadow-sm flex items-center justify-center text-gray-500 group-hover:text-orange-600"><i class="fas fa-calendar-alt"></i></div>
                                <div class="ml-4 text-left">
                                    <p class="text-sm font-bold text-gray-800">Manage Timetable</p>
                                    <p class="text-xs text-gray-400">Class schedules</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </main>

    <script>
        // Chart Configuration
        const ctx = document.getElementById('mainChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'Attendance Rate',
                    data: [92, 94, 96, 91, 98, 85],
                    borderColor: '#4f46e5', // Indigo 600
                    backgroundColor: (context) => {
                        const ctx = context.chart.ctx;
                        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                        gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)');
                        gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');
                        return gradient;
                    },
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#4f46e5',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: { size: 13 },
                        bodyFont: { size: 13 },
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 60,
                        grid: { borderDash: [4, 4], color: '#f1f5f9' },
                        ticks: { color: '#94a3b8' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#94a3b8' }
                    }
                }
            }
        });
    </script>
<?php include 'includes/footer.php'; ?>