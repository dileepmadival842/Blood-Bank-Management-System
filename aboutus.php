<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us - Blood Bank Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Font Awesome for Icons -->
  <script src="https://kit.fontawesome.com/2c624fbb65.js" crossorigin="anonymous"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background: #ececec;
      display: flex;
      flex-direction: column;
    }

    /* Header */
    header {
      background-color: #a01010;
      color: white;
      padding: 1.5em 1em;
      text-align: center;
      position: relative;
      box-shadow: 0 4px 6px rgba(0,0,0,0.15);
    }

    header h1 {
      font-size: 2rem;
    }

    nav {
      margin-top: 0.5em;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 2rem;
    }

    nav li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s ease;
    }

    nav li a:hover {
      text-decoration: underline;
    }

    /* Main Section */
    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3em 1em;
    }

    .about-box {
      max-width: 1000px;
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-radius: 20px;
      padding: 2.5em;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
      animation: slideUp 1s ease;
    }

    .about-box h2 {
      font-size: 1.8rem;
      margin-bottom: 1.5em;
      color: #a01010;
      text-align: center;
    }

    .about-box p {
      font-size: 1.05rem;
      margin-bottom: 1.2em;
      color: #333;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Footer */
    footer {
      background-color: #a01010;
      color: white;
      text-align: center;
      padding: 1em;
      font-size: 0.95rem;
      box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.15);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .about-box {
        padding: 1.5em;
      }

      header h1 {
        font-size: 1.5rem;
      }

      nav ul {
        flex-direction: column;
        gap: 0.5em;
      }
    }
  </style>
</head>

<body>
  <header>
    <h1>Blood Bank Management System</h1>
    <nav>
      <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="about-box">
      <h2>ABOUT US</h2>
      <p>Welcome to our Blood Bank Management System! We are a platform dedicated to connecting blood donors with those in need, making it easier for people to donate and receive blood in a safe and efficient manner.</p>
      <p>Our system allows for both user and admin login. As a user, you can register to either donate or receive blood. You can also view your donation history and receive notifications when your blood type is needed by a recipient. Additionally, you will be notified of upcoming blood donation camps in your area, so you can plan to donate blood and help save lives.</p>
      <p>As an admin, you have full control over the system. You can manage and approve new user registrations, monitor blood inventory, and track donation and recipient information. You can also manage blood camps, schedule and notify the users about upcoming blood camps.</p>
      <p>We are dedicated to ensuring the safety and security of all our users, and our system complies with all relevant regulations and guidelines. Our goal is to make the blood donation and receiving process as easy and efficient as possible, while also helping to save lives. Join us in our mission to make a difference in the community by donating blood today.</p>
    </div>
  </main>

  <footer>
    Rohistan, Dileep and Prajwal. © All Rights Reserved.
  </footer>
</body>
</html>
