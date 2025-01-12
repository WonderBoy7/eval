<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fontawesome-5/css/all.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><i class="fab fa-apple"></i></span>
                        <span class="title">Brand Name</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">DashBoard</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="title">Billeterie</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="far fa-comment"></i></span>
                        <span class="title">Seance</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-question"></i></span>
                        <span class="title">Help</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <span class="title">Password</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- search -->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here" name="" id="">
                        <i class="fas fa-search"></i>
                    </label>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="assets/images/user.jpg" alt="">
                </div>
            </div>
            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox"><i class="far fa-eye"></i></div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>
                    <div class="iconBox"><i class="fas fa-shopping-cart"></i></div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>
                    <div class="iconBox"><i class="fas fa-comments"></i></div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earnings</div>
                    </div>
                    <div class="iconBox"><i class="far fa-money-bill-alt"></i></div>
                </div>
            </div>

            <div class="details">
                <!-- order details list -->
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Star Refirgerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Window Coolers</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Speakers</td>
                                <td>$620</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>Hp Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Wall Fan</td>
                                <td>$110</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Adidas Shoes</td>
                                <td>$620</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>Denim Shirts</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Casual Shoes</td>
                                <td>$575</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Wall Fan</td>
                                <td>$110</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Denim Shirts</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- New Customers -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>
                    <table>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img1.jpg" alt=""></div></td>
                            <td><h4>David<br><span>Italy</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img2.jpg" alt=""></div></td>
                            <td><h4>Muhammad<br><span>India</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img3.jpg" alt=""></div></td>
                            <td><h4>Amelie<br><span>France</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img4.jpg" alt=""></div></td>
                            <td><h4>Olivia<br><span>USA</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img5.jpg" alt=""></div></td>
                            <td><h4>Gojo<br><span>Japan</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img6.jpg" alt=""></div></td>
                            <td><h4>Ashraf<br><span>India</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img7.jpg" alt=""></div></td>
                            <td><h4>Diana<br><span>Malaysia</span></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;"><div class="imgBox"><img src="assets/images/img8.jpg" alt=""></div></td>
                            <td><h4>Amit<br><span>India</span></h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ url('assets/js/script.js') }}"></script>
</body>
</html>
