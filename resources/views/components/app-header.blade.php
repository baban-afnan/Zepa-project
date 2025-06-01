<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Modern, clean white header */
        :root {
            --primary-color: #4361ee;
            --hover-color: #3a56d4;
            --text-color: #2d3748;
            --light-text: #718096;
            --border-color: #e2e8f0;
            --hover-bg: #f8fafc;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: var(--text-color);
        }
        
        .header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: relative;
            width: 100%;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .logo {
            font-size: 22px;
            font-weight: 600;
            color: var(--text-color);
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 28px;
            width: auto;
        }
        
        /* Professional sidebar toggle */
        .sidemenu-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--light-text);
        }
        
        .sidemenu-toggle:hover {
            background-color: var(--hover-bg);
            color: var(--primary-color);
        }
        
        .animated-arrow {
            position: relative;
            width: 20px;
            height: 20px;
        }
        
        .animated-arrow span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: currentColor;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: .25s ease-in-out;
        }
        
        .animated-arrow span:nth-child(1) {
            top: 6px;
        }
        
        .animated-arrow span:nth-child(2) {
            top: 12px;
        }
        
        .animated-arrow span:nth-child(3) {
            top: 18px;
        }
        
        /* User menu styles */
        .user-menu {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
        }
        
        .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light-text);
            font-size: 18px;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .user-icon:hover {
            background-color: var(--hover-bg);
            color: var(--primary-color);
        }
        
        .dropdown {
            position: absolute;
            top: 55px;
            right: 0;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 220px;
            overflow: hidden;
            z-index: 100;
            display: none;
            animation: fadeIn 0.2s ease-out;
            border: 1px solid var(--border-color);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .dropdown.show {
            display: block;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem;
            color: var(--text-color);
            font-size: 14px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
            gap: 0.75rem;
        }
        
        .dropdown-item:hover {
            background-color: var(--hover-bg);
            color: var(--primary-color);
        }
        
        .dropdown-item i {
            width: 20px;
            text-align: center;
            color: var(--light-text);
        }
        
        .dropdown-item:hover i {
            color: var(--primary-color);
        }
        
        .divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 0.25rem 0;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .header {
                padding: 0 1rem;
                height: 60px;
            }
            
            .logo {
                font-size: 18px;
            }
            
            .logo img {
                height: 24px;
            }
            
            .user-icon {
                width: 36px;
                height: 36px;
                font-size: 16px;
            }
            
            .dropdown {
                top: 50px;
                width: 200px;
            }
            
            .sidemenu-toggle {
                width: 32px;
                height: 32px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="toggle-dark">
                </a>
            </div>
            <a aria-label="Hide Sidebar"
                class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                data-bs-toggle="sidebar" href="javascript:void(0);">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        
        <div class="user-menu" id="userMenu">
            <div class="user-icon">
                <i class="far fa-user"></i>
            </div>
            
            <div class="dropdown" id="dropdownMenu">
                <div class="dropdown-item">
                    <i class="far fa-user"></i>
                    <span><a href="{{ route('profile.edit') }}" style="text-decoration: none; color: inherit;">My Profile</a></span>
                </div>
                <div class="dropdown-item">
                    <i class="far fa-question-circle"></i>
                     <span><a href="{{ route('support') }}" style="text-decoration: none; color: inherit;">Support</a></span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="dropdown-item d-flex align-items-center">
                                 <i class="ti ti-logout fs-18 me-2 op-7" style="margin-left:2px;"></i>
                                 <span>Log Out</span>
                             </button>
                         </form>
                     </li>
                 </ul>

             </div>
        </div>
    </header>

    <script>
        const userMenu = document.getElementById('userMenu');
        const dropdownMenu = document.getElementById('dropdownMenu');
        
        userMenu.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            dropdownMenu.classList.remove('show');
        });
        
        // Prevent dropdown from closing when clicking inside it
        dropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    </script>
</body>
</html>