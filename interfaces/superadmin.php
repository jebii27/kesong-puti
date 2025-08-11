
<?php
require '../connection.php'; 

// Check if the user is logged in as super admin
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'superadmin') {
    header('Location: ../login.php');
    exit();
    
    
}
// else{
//         header('Location: admin.html');
//     }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kesong Puti - Admin</title>

    <!-- BOOTSTRAP ICONS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../css/admin.css" />
  </head>

  <body>
    <div class="sidebar">
      <!-- TOP SIDEBAR -->
      <div class="header">
        <div class="sidebar-header">
          <span>Admin Panel</span>
        </div>
        <i class="bi bi-three-dots" id="btn"></i>
      </div>

      <div class="user">
        <img src="../assets/logo.png" alt="admin" class="profile-img" />
        <div>
          <p class="name">Arlene Macalinao</p>
          <p class="type">Super Admin</p>
        </div>
      </div>
      <!-- TOP SIDEBAR -->

      <!-- MIDDLE SIDEBAR -->
      <div class="sidebar-middle">
        <ul>
          <!-- DASHBOARD -->
          <li class="nav-tab dashboard-tab">
            <a href="#" class="main-tab" id="dashboard-link">
              <i class="bi bi-pie-chart-fill"></i>
              <span class="nav-item">Dashboard</span>
              <i class="bi bi-chevron-down dropdown-icon"></i>
            </a>
            <ul class="sub-menu">
              <li>
                <a
                  href="#"
                  class="sub-tab active-sub"
                  data-content="overview-content"
                  >Overview</a
                >
              </li>
              <li>
                <a href="#" class="sub-tab" data-content="inventory-content"
                  >Inventory</a
                >
              </li>
            </ul>
          </li>

          <!-- SHOP -->
          <li class="nav-tab shop-tab">
            <a href="#" class="main-tab" id="shop-link">
              <i class="bi bi-shop"></i>
              <span class="nav-item">Shop</span>
              <i class="bi bi-chevron-down dropdown-icon"></i>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="#" class="sub-tab" data-content="products-content"
                  >All Products</a
                >
              </li>
              <li>
                <a href="#" class="sub-tab" data-content="orders-content"
                  >Orders</a
                >
              </li>
              <li>
                <a href="#" class="sub-tab" data-content="payment-content"
                  >Payment Method</a
                >
              </li>
            </ul>
          </li>

          <!-- INBOX -->
          <li>
            <a
              href="#"
              class="main-tab single-tab"
              data-content="inbox-content"
            >
              <i class="bi bi-envelope-fill"></i>
              <span class="nav-item">Inbox</span>
            </a>
          </li>
          <!-- INBOX -->

          <!-- FEEDBACKS -->
          <li>
            <a
              href="#"
              class="main-tab single-tab"
              data-content="feedback-content"
            >
              <i class="bi bi-hand-thumbs-up-fill"></i>
              <span class="nav-item">Feedbacks</span>
            </a>
          </li>
          <!-- FEEDBACKS -->

          <!-- CMS -->
          <li class="nav-tab cms-tab">
            <a href="#" class="main-tab" id="cms-link">
              <i class="bi bi-pencil-square"></i>
              <span class="nav-item">Edit Website</span>
              <i class="bi bi-chevron-down dropdown-icon"></i>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="#" class="sub-tab" data-content="home-content"
                  >Home Page</a
                >
              </li>
              <li>
                <a href="#" class="sub-tab" data-content="about-content"
                  >About Us</a
                >
              </li>
              <li>
                <a href="#" class="sub-tab" data-content="footer-content"
                  >Footer</a
                >
              </li>
              <li>
                <a href="#" class="sub-tab" data-content="faq-content">FAQ</a>
              </li>
            </ul>
          </li>
          <!-- CMS -->
        </ul>
      </div>
      <!-- MIDDLE SIDEBAR -->

      <!-- BOTTOM SIDEBAR -->
      <div class="sidebar-bottom">
        <ul>
          <li>
            <a
              href="#"
              class="main-tab single-tab"
              data-content="account-settings-content"
            >
              <i class="bi bi-gear"></i>
              <span class="nav-item">Account Settings</span>
            </a>
          </li>
          <li>
            <a href="#" id="logout-button">
              <i class="bi bi-box-arrow-right"></i>
              <span class="nav-item">Logout</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- BOTTOM SIDEBAR -->
    </div>

    <!-- OVERALL CONTENTS -->
    <div class="main-content">
      <!-- DASHBOARD TAB -->
      <div class="box" id="overview-content" style="display: none">
        <h1>Dashboard Overview</h1>

        <div class="overview">
          <div class="container products">1</div>
          <div class="container pending-orders">2</div>
          <div class="container new-orders">3</div>
          <div class="container completed-orders">4</div>
          <div class="container top-selling">5</div>
          <div class="container top-viewed">6</div>
          <div class="container low-stock">7</div>
        </div>
      </div>
      <div class="box" id="inventory-content" style="display: none">
        <h1>Inventory</h1>
      </div>

      <!-- DASHBOARD TAB -->

      <!-- SHOP TAB -->
      <!-- PRODUCTS -->
      <div class="box content-shop" id="products-content" style="display: none">
        <h1>Products Management</h1>

        <div class="filter-bar">
          <input
            type="text"
            id="productSearch"
            placeholder="Search product by name..."
          />

          <select id="categoryFilter">
            <option value="all">All Categories</option>
            <option value="cheese">Cheese</option>
            <option value="ice-cream">Ice Cream</option>
            <option value="snack">Salad</option>
          </select>

          <h2>Total Products: 100</h2>
        </div>

        <!-- PRODUCTS -->
        <div class="product-grid" id="productGrid">
          <!-- Product -->
          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>

          <div class="product-card" data-name="Classic Kesong Puti">
            <img src="../assets/kesong puti.png" alt="Product 1" />
            <div class="product-info">
              <h3>Classic Kesong Puti</h3>
              <p>₱120</p>
              <button class="view-btn">View Details</button>
            </div>
          </div>
        </div>
        <!-- PRODUCTS -->
      </div>

      <!-- ORDERS -->
      <div class="box" id="orders-content" style="display: none">
        <h1>Orders Overview</h1>

        <div class="orders-container">
          <div class="orders-header">
            <input
              type="text"
              id="orderSearch"
              placeholder="Search by customer or order ID..."
            />
            <select id="orderStatusFilter">
              <option value="all">All Status</option>
              <option value="pending">Pending</option>
              <option value="processing">Processing</option>
              <option value="shipped">Shipped</option>
              <option value="completed">Completed</option>
              <option value="cancelled">Cancelled</option>
            </select>
            <select id="orderTypeFilter">
              <option value="all">All Types</option>
              <option value="pickup">Pickup</option>
              <option value="delivery">Delivery</option>
            </select>
          </div>

          <table class="orders-table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Type</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="ordersTableBody">
              <tr data-status="pending" data-type="pickup">
                <td>#00123</td>
                <td>Juan Dela Cruz</td>
                <td>Aug 04, 2025</td>
                <td><span class="status pending">Pending</span></td>
                <td><span class="type-label pickup">Pickup</span></td>
                <td>₱360</td>
                <td><button class="view-btn">View</button></td>
              </tr>
              <tr data-status="completed" data-type="delivery">
                <td>#00124</td>
                <td>Maria Santos</td>
                <td>Aug 03, 2025</td>
                <td><span class="status completed">Completed</span></td>
                <td><span class="type-label delivery">Delivery</span></td>
                <td>₱540</td>
                <td><button class="view-btn">View</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- PAYMENT METHODS -->
      <div class="box" id="payment-content" style="display: none">
        <h1>Payment Methods</h1>

        <div class="payment-form">
          <div class="form-group">
            <label for="gcashName">GCash Account Name</label>
            <input
              type="text"
              id="gcashName"
              placeholder="Enter GCash account name"
            />
          </div>

          <div class="form-group">
            <label for="gcashNumber">GCash Number</label>
            <input type="text" id="gcashNumber" placeholder="09XXXXXXXXX" />
          </div>

          <div class="form-group">
            <label for="qrUpload">Upload QR Code</label>
            <input type="file" id="qrUpload" accept="image/*" />
            <div class="qr-preview">
              <img
                id="qrPreviewImage"
                src="assets/sample-qr.png"
                alt="QR Preview"
              />
            </div>
          </div>

          <button class="save-btn" onclick="savePaymentMethod()">
            Save Changes
          </button>
        </div>
      </div>
      <!-- SHOP TAB -->

      <!-- INBOX -->
      <div class="box" id="inbox-content" style="display: none">
        <h1>Inbox Messages</h1>

        <div class="contact-table-container">
          <input
            type="text"
            id="contactSearch"
            placeholder="Search by name or email..."
          />

          <table class="contact-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="contactTableBody">
              <tr>
                <td>Juan Dela Cruz</td>
                <td>juan@example.com</td>
                <td>09123456789</td>
                <td>Do you ship nationwide?</td>
                <td>Aug 5, 2025</td>
                <td>
                  <button class="view-btn">
                    <i class="bi bi-eye-fill"></i>
                  </button>
                  <button class="delete-btn">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Maria Santos</td>
                <td>maria.s@example.com</td>
                <td>09123456789</td>
                <td>I love your product!</td>
                <td>Aug 3, 2025</td>
                <td>
                  <button class="view-btn">
                    <i class="bi bi-eye-fill"></i>
                  </button>
                  <button class="delete-btn">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- INBOX -->

      <!-- FEEDBACK -->
      <div class="box" id="feedback-content" style="display: none">
        <h1>Feedbacks</h1>

        <div class="feedback-filter-bar">
          <input
            type="text"
            id="feedbackSearch"
            placeholder="Search by name, email, or message..."
          />
          <select id="ratingFilter">
            <option value="all">All Ratings</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
          </select>
        </div>

        <table class="feedback-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Rating</th>
              <th>Message</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="feedbackTableBody">
            <tr>
              <td>Juan Dela Cruz</td>
              <td>juan@example.com</td>
              <td>⭐⭐⭐⭐⭐</td>
              <td class="feedback-message">
                <span class="short-msg">The product quality is amazing!</span>
                <button
                  class="view-btn view-more"
                  data-message="The product quality is amazing! Will definitely order again. Fast delivery and well-packaged."
                  title="View More"
                >
                  <i class="bi bi-eye-fill"></i>
                </button>
              </td>
              <td>2025-08-05</td>
              <td>
                <button class="delete-btn">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Maria Santos</td>
              <td>maria.s@example.com</td>
              <td>⭐⭐⭐</td>
              <td class="feedback-message">
                <span class="short-msg">It was okay.</span>
                <button
                  class="view-btn view-more"
                  data-message="It was okay, but packaging could be better. I hope to see improvements next time."
                  title="View More"
                >
                  <i class="bi bi-eye-fill"></i>
                </button>
              </td>
              <td>2025-08-03</td>
              <td>
                <button class="delete-btn">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- MODAL for full message -->
        <div class="feedback-modal" id="feedbackModal">
          <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Full Message</h2>
            <p id="fullMessageText"></p>
          </div>
        </div>
      </div>
      <!-- FEEDBACK -->

      <!-- CMS -->
      <div class="box" id="home-content" style="display: none">
        <h1>Home Page</h1>
      </div>
      <div class="box" id="about-content" style="display: none">
        <h1>About Us</h1>
      </div>
      <div class="box" id="footer-content" style="display: none">
        <h1>Footer</h1>
      </div>
      <div class="box" id="faq-content" style="display: none">
        <h1>Frequently Asked Questions</h1>
      </div>
      <!-- CMS -->

      <!-- ACCOUNT SETTINGS -->
      <div class="box" id="account-settings-content" style="display: none">
        <h1>Account Settings</h1>
        <p>Manage your account details here.</p>
      </div>
      <!-- ACCOUNT SETTINGS -->
    </div>

    <!-- FUNCTIONS -->
    <script>
      const btn = document.querySelector("#btn");
      const sidebar = document.querySelector(".sidebar");
      const navTabs = document.querySelectorAll(".nav-tab");
      const subTabs = document.querySelectorAll(".sub-tab");
      const singleTabs = document.querySelectorAll(".single-tab");
      const contentBoxes = document.querySelectorAll(".main-content .box");

      // Toggle sidebar
      btn.onclick = () => sidebar.classList.toggle("active");

      // Toggle dropdowns
      navTabs.forEach((tab) => {
        const mainLink = tab.querySelector(".main-tab");

        mainLink.addEventListener("click", (e) => {
          e.preventDefault();
          if (sidebar.classList.contains("active")) {
            tab.classList.toggle("open");
          }
        });
      });

      // Handle sub-tab clicks
      subTabs.forEach((tab) => {
        tab.addEventListener("click", (e) => {
          e.preventDefault();
          const targetId = tab.getAttribute("data-content");

          // Hide all boxes
          contentBoxes.forEach((box) => (box.style.display = "none"));
          // Show the one selected
          document.getElementById(targetId).style.display = "block";

          // Remove all active sub-tabs
          subTabs.forEach((el) => el.classList.remove("active-sub"));
          singleTabs.forEach((el) => el.classList.remove("active-tab"));
          // Highlight selected
          tab.classList.add("active-sub");
        });
      });

      // Handle single (no-submenu) tab clicks
      singleTabs.forEach((tab) => {
        tab.addEventListener("click", (e) => {
          e.preventDefault();
          const targetId = tab.getAttribute("data-content");

          // Hide all content
          contentBoxes.forEach((box) => (box.style.display = "none"));
          // Show selected content
          document.getElementById(targetId).style.display = "block";

          // Remove other highlights
          subTabs.forEach((el) => el.classList.remove("active-sub"));
          singleTabs.forEach((el) => el.classList.remove("active-tab"));

          // Highlight current single tab
          tab.classList.add("active-tab");
        });
      });

      // Show default tab (Dashboard Overview)
      document.getElementById("overview-content").style.display = "block";

      document.getElementById("logout-button").addEventListener("click", function(e) {
    e.preventDefault();
    if (confirm("Are you sure you want to logout?")) {
      window.location.href = "../login.php";
    }
  });
    </script>

    <script>
      const orderSearch = document.getElementById("orderSearch");
      const orderStatusFilter = document.getElementById("orderStatusFilter");
      const orderRows = document.querySelectorAll("#ordersTableBody tr");

      function filterOrders() {
        const searchTerm = orderSearch.value.toLowerCase();
        const selectedStatus = orderStatusFilter.value;

        orderRows.forEach((row) => {
          const customerName = row.children[1].textContent.toLowerCase();
          const orderId = row.children[0].textContent.toLowerCase();
          const status = row.getAttribute("data-status");

          const matchesSearch =
            customerName.includes(searchTerm) || orderId.includes(searchTerm);
          const matchesStatus =
            selectedStatus === "all" || status === selectedStatus;

          row.style.display = matchesSearch && matchesStatus ? "" : "none";
        });
      }

      orderSearch.addEventListener("input", filterOrders);
      orderStatusFilter.addEventListener("change", filterOrders);
    </script>

    <script>
      const qrUpload = document.getElementById("qrUpload");
      const qrPreview = document.getElementById("qrPreviewImage");

      qrUpload.addEventListener("change", function () {
        const file = qrUpload.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            qrPreview.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });

      function savePaymentMethod() {
        const gcashName = document.getElementById("gcashName").value.trim();
        const gcashNumber = document.getElementById("gcashNumber").value.trim();

        if (!gcashName || !gcashNumber) {
          alert("Please fill out all fields.");
          return;
        }

        // Simulate save process (replace with backend call later)
        alert("GCash payment method has been saved successfully!");
      }
    </script>

    <script>
      const contactSearch = document.getElementById("contactSearch");
      const contactRows = document.querySelectorAll("#contactTableBody tr");

      contactSearch.addEventListener("input", () => {
        const term = contactSearch.value.toLowerCase();

        contactRows.forEach((row) => {
          const name = row.children[0].textContent.toLowerCase();
          const email = row.children[1].textContent.toLowerCase();
          row.style.display =
            name.includes(term) || email.includes(term) ? "" : "none";
        });
      });
    </script>

    <script>
      const feedbackSearch = document.getElementById("feedbackSearch");
      const ratingFilter = document.getElementById("ratingFilter");
      const feedbackRows = document.querySelectorAll("#feedbackTableBody tr");

      const modal = document.getElementById("feedbackModal");
      const fullMessageText = document.getElementById("fullMessageText");
      const closeModalBtn = document.querySelector(".close-modal");

      function filterFeedback() {
        const searchTerm = feedbackSearch.value.toLowerCase();
        const selectedRating = ratingFilter.value;

        feedbackRows.forEach((row) => {
          const name = row.children[0].textContent.toLowerCase();
          const email = row.children[1].textContent.toLowerCase();
          const message = row.children[3].textContent.toLowerCase();
          const rating = row.children[2].textContent.length;

          const matchesSearch =
            name.includes(searchTerm) ||
            email.includes(searchTerm) ||
            message.includes(searchTerm);
          const matchesRating =
            selectedRating === "all" || rating == selectedRating;

          row.style.display = matchesSearch && matchesRating ? "" : "none";
        });
      }

      feedbackSearch.addEventListener("input", filterFeedback);
      ratingFilter.addEventListener("change", filterFeedback);

      // View More modal
      document.querySelectorAll(".view-more").forEach((button) => {
        button.addEventListener("click", () => {
          fullMessageText.textContent = button.getAttribute("data-message");
          modal.style.display = "flex";
        });
      });

      closeModalBtn.onclick = () => (modal.style.display = "none");
      window.onclick = (e) => {
        if (e.target === modal) modal.style.display = "none";
      };
    </script>
  </body>
</html>


