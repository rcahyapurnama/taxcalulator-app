<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Bootstrap CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <title>Kalkulator Pajak | <?php echo $pageTitle; ?> </title>
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <nav class="navbar navbar-expand-lg shadow fixed-top bg-primary" data-bs-theme="dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <h3>TAX-CAL</h3>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kalkulator Pajak
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pph21.php">PPH 21</a></li>
                  <li><a class="dropdown-item" href="pph22-impor.php">PPH 22</a></li>
                  <li><a class="dropdown-item" href="pph23.php">PPH 23</a></li>
                </ul>

              <li class="nav-item dropdown">
                <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>

                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light">
                      <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
                      Light
                    </button>
                  </li>
                  <li>
                    <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark">
                      <i class="bi bi-moon-stars-fill me-2 opacity-50" data-theme-icon="bi-moon-stars-fill"></i>
                      Dark
                    </button>
                  </li>
                  <li>
                    <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="auto">
                      <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half"></i>
                      Auto
                    </button>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
      /*!
       * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
       * Copyright 2011-2023 The Bootstrap Authors
       * Licensed under the Creative Commons Attribution 3.0 Unported License.
       */

      (() => {
        'use strict'

        const getStoredTheme = () => localStorage.getItem('theme')
        const setStoredTheme = theme => localStorage.setItem('theme', theme)

        const getPreferredTheme = () => {
          const storedTheme = getStoredTheme()
          if (storedTheme) {
            return storedTheme
          }

          return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = theme => {
          if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-bs-theme', 'dark')
          } else {
            document.documentElement.setAttribute('data-bs-theme', theme)
          }
        }

        setTheme(getPreferredTheme())

        const showActiveTheme = theme => {

          const activeThemeIcon = document.querySelector('.theme-icon-active')
          const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
          const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon

          document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
            element.classList.remove('active')
          })

          btnToActive.classList.add('active')
          activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
          activeThemeIcon.classList.add(iconOfActiveBtn)
          activeThemeIcon.dataset.iconActive = iconOfActiveBtn


        }

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
          const storedTheme = getStoredTheme()
          if (storedTheme !== 'light' || storedTheme !== 'dark') {
            setTheme(getPreferredTheme())
          }
        })

        window.addEventListener('DOMContentLoaded', () => {
          showActiveTheme(getPreferredTheme())

          document.querySelectorAll('[data-bs-theme-value]')
            .forEach(toggle => {
              toggle.addEventListener('click', () => {
                const theme = toggle.getAttribute('data-bs-theme-value')
                setStoredTheme(theme)
                setTheme(theme)
                showActiveTheme(theme, true)
              })
            })
        })
      })()
    </script>
    <script src="https://kit.fontawesome.com/70b688cff9.js" crossorigin="anonymous"></script>
    <!-- J-QUERY -->
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <script src="assets/js/jquery-v3.7.1.js"></script>


    <main class="main">