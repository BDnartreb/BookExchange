<?php 
/**
 * This file is the global structure of a page.
 * It contains the elements generated by the other views.  
 * 
 * Required variables are : 
 *      $title string : title of the page.
 *      $content string : content of the page. 
 */


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Inter Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Inter Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="./css/style.css">


   </head>

<body>
    <header>
        <div class="logo">
            <div class="TT-logo-greenbackground">
                <!--TT white Logo-->
                <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.595655 7.51205C0.643482 7.08957 0.667396 6.50368 0.667396 5.75439C0.667396 4.32754 0.611597 2.70937 0.5 0.899902C2.05439 0.94773 4.72476 0.971644 8.5111 0.971644C12.2815 0.971644 14.9399 0.94773 16.4863 0.899902C16.3747 2.70937 16.3189 4.32754 16.3189 5.75439C16.3189 6.50368 16.3428 7.08957 16.3907 7.51205H15.8287C15.2946 5.36778 14.6011 3.82535 13.7482 2.88474C12.9033 1.93616 11.9905 1.46187 11.0101 1.46187H10.9862V15.4753C10.9862 16.1608 11.0539 16.659 11.1894 16.9699C11.3329 17.2808 11.588 17.4881 11.9547 17.5917C12.3214 17.6953 12.9033 17.7471 13.7004 17.7471V18.2374C11.4047 18.1895 9.61511 18.1656 8.33174 18.1656C7.17591 18.1656 5.49797 18.1895 3.29791 18.2374V17.7471C4.09503 17.7471 4.67693 17.6953 5.04361 17.5917C5.41028 17.4881 5.66138 17.2808 5.79689 16.9699C5.94037 16.659 6.01211 16.1608 6.01211 15.4753V1.46187H5.9882C4.99179 1.46187 4.07112 1.93218 3.22616 2.87278C2.38918 3.80542 1.69967 5.35184 1.15763 7.51205H0.595655Z" fill="white"/>
                    <path d="M16.9209 15.6746C16.9687 15.2522 16.9926 14.6663 16.9926 13.917C16.9926 12.4901 16.9368 10.872 16.8252 9.0625C18.3796 9.11033 21.05 9.13424 24.8363 9.13424C28.6067 9.13424 31.2651 9.11033 32.8115 9.0625C32.6999 10.872 32.6441 12.4901 32.6441 13.917C32.6441 14.6663 32.668 15.2522 32.7159 15.6746H32.1539C31.6198 13.5304 30.9263 11.9879 30.0734 11.0473C29.2284 10.0988 28.3157 9.62447 27.3353 9.62447H27.3114V23.6379C27.3114 24.3234 27.3791 24.8216 27.5146 25.1325C27.6581 25.4434 27.9132 25.6507 28.2799 25.7543C28.6465 25.8579 29.2284 25.9097 30.0256 25.9097V26.4C27.7299 26.3521 25.9403 26.3282 24.6569 26.3282C23.5011 26.3282 21.8232 26.3521 19.6231 26.4V25.9097C20.4202 25.9097 21.0021 25.8579 21.3688 25.7543C21.7355 25.6507 21.9866 25.4434 22.1221 25.1325C22.2656 24.8216 22.3373 24.3234 22.3373 23.6379V9.62447H22.3134C21.317 9.62447 20.3963 10.0948 19.5514 11.0354C18.7144 11.968 18.0249 13.5144 17.4828 15.6746H16.9209Z" fill="white"/>
                </svg>
            </div>
            <div>
                <!--Logo TomTroc green -->
                <svg width="88" height="16" viewBox="0 0 88 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.52 0.84C12.4667 1.45333 12.4267 2.05333 12.4 2.64C12.3867 3.21333 12.38 3.65333 12.38 3.96C12.38 4.26667 12.3867 4.55333 12.4 4.82C12.4133 5.08667 12.4267 5.32 12.44 5.52H11.98C11.7933 4.45333 11.5667 3.62 11.3 3.02C11.0333 2.40667 10.68 1.96667 10.24 1.7C9.81333 1.43333 9.24667 1.3 8.54 1.3H7.9V12.7C7.9 13.2467 7.94667 13.6533 8.04 13.92C8.14667 14.1867 8.35333 14.3667 8.66 14.46C8.96667 14.54 9.41333 14.5867 10 14.6V15C9.6 14.9733 9.08 14.96 8.44 14.96C7.8 14.9467 7.14667 14.94 6.48 14.94C5.78667 14.94 5.13333 14.9467 4.52 14.96C3.92 14.96 3.43333 14.9733 3.06 15V14.6C3.63333 14.5867 4.07333 14.54 4.38 14.46C4.68667 14.3667 4.89333 14.1867 5 13.92C5.10667 13.6533 5.16 13.2467 5.16 12.7V1.3H4.5C3.80667 1.3 3.24 1.43333 2.8 1.7C2.36 1.96667 2.00667 2.40667 1.74 3.02C1.47333 3.62 1.25333 4.45333 1.08 5.52H0.62C0.646667 5.32 0.66 5.08667 0.66 4.82C0.673333 4.55333 0.68 4.26667 0.68 3.96C0.68 3.65333 0.666667 3.21333 0.64 2.64C0.626667 2.05333 0.593333 1.45333 0.54 0.84C1.12667 0.853333 1.77333 0.866666 2.48 0.879999C3.18667 0.893333 3.89333 0.899999 4.6 0.899999C5.30667 0.899999 5.95333 0.899999 6.54 0.899999C7.11333 0.899999 7.75333 0.899999 8.46 0.899999C9.16667 0.899999 9.87333 0.893333 10.58 0.879999C11.2867 0.866666 11.9333 0.853333 12.52 0.84ZM17.807 4.38C18.727 4.38 19.5404 4.56667 20.247 4.94C20.967 5.3 21.5337 5.88 21.947 6.68C22.3737 7.48 22.587 8.53333 22.587 9.84C22.587 11.1467 22.3737 12.2 21.947 13C21.5337 13.8 20.967 14.38 20.247 14.74C19.5404 15.1 18.727 15.28 17.807 15.28C16.887 15.28 16.067 15.1 15.347 14.74C14.627 14.38 14.0604 13.8 13.647 13C13.2337 12.2 13.027 11.1467 13.027 9.84C13.027 8.53333 13.2337 7.48 13.647 6.68C14.0604 5.88 14.627 5.3 15.347 4.94C16.067 4.56667 16.887 4.38 17.807 4.38ZM17.807 4.78C17.1804 4.78 16.667 5.18 16.267 5.98C15.8804 6.76667 15.687 8.05333 15.687 9.84C15.687 11.6267 15.8804 12.9133 16.267 13.7C16.667 14.4867 17.1804 14.88 17.807 14.88C18.4204 14.88 18.927 14.4867 19.327 13.7C19.727 12.9133 19.927 11.6267 19.927 9.84C19.927 8.05333 19.727 6.76667 19.327 5.98C18.927 5.18 18.4204 4.78 17.807 4.78ZM30.9389 4.38C31.4589 4.38 31.8922 4.45333 32.2389 4.6C32.5989 4.74667 32.8789 4.93333 33.0789 5.16C33.3189 5.41333 33.4856 5.75333 33.5789 6.18C33.6722 6.59333 33.7189 7.12 33.7189 7.76V13.14C33.7189 13.7 33.8122 14.08 33.9989 14.28C34.1989 14.48 34.5322 14.58 34.9989 14.58V15C34.7589 14.9867 34.3989 14.9733 33.9189 14.96C33.4389 14.9333 32.9722 14.92 32.5189 14.92C32.0389 14.92 31.5722 14.9333 31.1189 14.96C30.6789 14.9733 30.3456 14.9867 30.1189 15V14.58C30.5056 14.58 30.7789 14.48 30.9389 14.28C31.1122 14.08 31.1989 13.7 31.1989 13.14V7.08C31.1989 6.72 31.1722 6.4 31.1189 6.12C31.0656 5.82667 30.9522 5.6 30.7789 5.44C30.6056 5.26667 30.3389 5.18 29.9789 5.18C29.5656 5.18 29.1922 5.3 28.8589 5.54C28.5256 5.78 28.2589 6.11333 28.0589 6.54C27.8722 6.95333 27.7789 7.42 27.7789 7.94V13.14C27.7789 13.7 27.8589 14.08 28.0189 14.28C28.1789 14.48 28.4589 14.58 28.8589 14.58V15C28.6322 14.9867 28.2989 14.9733 27.8589 14.96C27.4322 14.9333 26.9922 14.92 26.5389 14.92C26.0456 14.92 25.5456 14.9333 25.0389 14.96C24.5322 14.9733 24.1522 14.9867 23.8989 15V14.58C24.3922 14.58 24.7389 14.48 24.9389 14.28C25.1522 14.08 25.2589 13.7 25.2589 13.14V6.84C25.2589 6.24 25.1589 5.8 24.9589 5.52C24.7722 5.22667 24.4189 5.08 23.8989 5.08V4.66C24.3256 4.7 24.7389 4.72 25.1389 4.72C25.6322 4.72 26.0989 4.7 26.5389 4.66C26.9922 4.60667 27.4056 4.53333 27.7789 4.44V6.44C28.1122 5.70667 28.5589 5.18 29.1189 4.86C29.6789 4.54 30.2856 4.38 30.9389 4.38ZM36.9589 4.38C37.4789 4.38 37.9122 4.45333 38.2589 4.6C38.6189 4.74667 38.8989 4.93333 39.0989 5.16C39.3389 5.41333 39.5056 5.75333 39.5989 6.18C39.6922 6.59333 39.7389 7.12 39.7389 7.76V13.14C39.7389 13.7 39.8389 14.08 40.0389 14.28C40.2522 14.48 40.6056 14.58 41.0989 14.58V15C40.8589 14.9867 40.4856 14.9733 39.9789 14.96C39.4856 14.9333 39.0056 14.92 38.5389 14.92C38.0589 14.92 37.5922 14.9333 37.1389 14.96C36.6989 14.9733 36.3656 14.9867 36.1389 15V14.58C36.5256 14.58 36.7989 14.48 36.9589 14.28C37.1322 14.08 37.2189 13.7 37.2189 13.14V7.08C37.2189 6.72 37.1856 6.4 37.1189 6.12C37.0656 5.82667 36.9456 5.6 36.7589 5.44C36.5722 5.26667 36.2922 5.18 35.9189 5.18C35.5056 5.18 35.1322 5.30667 34.7989 5.56C34.4656 5.81333 34.1989 6.15333 33.9989 6.58C33.8122 6.99333 33.7122 7.46 33.6989 7.98L33.5989 6.54C33.9589 5.71333 34.4389 5.14667 35.0389 4.84C35.6389 4.53333 36.2789 4.38 36.9589 4.38ZM58.1841 0.84C58.1307 1.45333 58.0907 2.05333 58.0641 2.64C58.0507 3.21333 58.0441 3.65333 58.0441 3.96C58.0441 4.26667 58.0507 4.55333 58.0641 4.82C58.0774 5.08667 58.0907 5.32 58.1041 5.52H57.6441C57.4574 4.45333 57.2307 3.62 56.9641 3.02C56.6974 2.40667 56.3441 1.96667 55.9041 1.7C55.4774 1.43333 54.9107 1.3 54.2041 1.3H53.5641V12.7C53.5641 13.2467 53.6107 13.6533 53.7041 13.92C53.8107 14.1867 54.0174 14.3667 54.3241 14.46C54.6307 14.54 55.0774 14.5867 55.6641 14.6V15C55.2641 14.9733 54.7441 14.96 54.1041 14.96C53.4641 14.9467 52.8107 14.94 52.1441 14.94C51.4507 14.94 50.7974 14.9467 50.1841 14.96C49.5841 14.96 49.0974 14.9733 48.7241 15V14.6C49.2974 14.5867 49.7374 14.54 50.0441 14.46C50.3507 14.3667 50.5574 14.1867 50.6641 13.92C50.7707 13.6533 50.8241 13.2467 50.8241 12.7V1.3H50.1641C49.4707 1.3 48.9041 1.43333 48.4641 1.7C48.0241 1.96667 47.6707 2.40667 47.4041 3.02C47.1374 3.62 46.9174 4.45333 46.7441 5.52H46.2841C46.3107 5.32 46.3241 5.08667 46.3241 4.82C46.3374 4.55333 46.3441 4.26667 46.3441 3.96C46.3441 3.65333 46.3307 3.21333 46.3041 2.64C46.2907 2.05333 46.2574 1.45333 46.2041 0.84C46.7907 0.853333 47.4374 0.866666 48.1441 0.879999C48.8507 0.893333 49.5574 0.899999 50.2641 0.899999C50.9707 0.899999 51.6174 0.899999 52.2041 0.899999C52.7774 0.899999 53.4174 0.899999 54.1241 0.899999C54.8307 0.899999 55.5374 0.893333 56.2441 0.879999C56.9507 0.866666 57.5974 0.853333 58.1841 0.84ZM65.8709 4.38C66.2843 4.38 66.6243 4.46667 66.8909 4.64C67.1709 4.81333 67.3776 5.03333 67.5109 5.3C67.6443 5.56667 67.7109 5.84667 67.7109 6.14C67.7109 6.58 67.5776 6.94667 67.3109 7.24C67.0576 7.53333 66.7176 7.68 66.2909 7.68C65.8909 7.68 65.5643 7.57333 65.3109 7.36C65.0576 7.14667 64.9309 6.85333 64.9309 6.48C64.9309 6.14667 65.0109 5.86667 65.1709 5.64C65.3443 5.41333 65.5376 5.23333 65.7509 5.1C65.6043 5.02 65.4376 4.99333 65.2509 5.02C64.9309 5.04667 64.6376 5.16 64.3709 5.36C64.1043 5.56 63.8776 5.80667 63.6909 6.1C63.5043 6.39333 63.3576 6.70667 63.2509 7.04C63.1576 7.37333 63.1109 7.69333 63.1109 8V12.94C63.1109 13.5933 63.2776 14.0333 63.6109 14.26C63.9443 14.4733 64.4309 14.58 65.0709 14.58V15C64.7643 14.9867 64.3176 14.9733 63.7309 14.96C63.1576 14.9333 62.5576 14.92 61.9309 14.92C61.4109 14.92 60.8909 14.9333 60.3709 14.96C59.8643 14.9733 59.4843 14.9867 59.2309 15V14.58C59.7243 14.58 60.0709 14.48 60.2709 14.28C60.4843 14.08 60.5909 13.7 60.5909 13.14V6.84C60.5909 6.24 60.4909 5.8 60.2909 5.52C60.1043 5.22667 59.7509 5.08 59.2309 5.08V4.66C59.6576 4.7 60.0709 4.72 60.4709 4.72C60.9643 4.72 61.4309 4.7 61.8709 4.66C62.3243 4.60667 62.7376 4.53333 63.1109 4.44V6.52C63.2709 6.14667 63.4776 5.8 63.7309 5.48C63.9976 5.16 64.3109 4.9 64.6709 4.7C65.0443 4.48667 65.4443 4.38 65.8709 4.38ZM73.1781 4.38C74.0981 4.38 74.9115 4.56667 75.6181 4.94C76.3381 5.3 76.9048 5.88 77.3181 6.68C77.7448 7.48 77.9581 8.53333 77.9581 9.84C77.9581 11.1467 77.7448 12.2 77.3181 13C76.9048 13.8 76.3381 14.38 75.6181 14.74C74.9115 15.1 74.0981 15.28 73.1781 15.28C72.2581 15.28 71.4381 15.1 70.7181 14.74C69.9981 14.38 69.4315 13.8 69.0181 13C68.6048 12.2 68.3981 11.1467 68.3981 9.84C68.3981 8.53333 68.6048 7.48 69.0181 6.68C69.4315 5.88 69.9981 5.3 70.7181 4.94C71.4381 4.56667 72.2581 4.38 73.1781 4.38ZM73.1781 4.78C72.5515 4.78 72.0381 5.18 71.6381 5.98C71.2515 6.76667 71.0581 8.05333 71.0581 9.84C71.0581 11.6267 71.2515 12.9133 71.6381 13.7C72.0381 14.4867 72.5515 14.88 73.1781 14.88C73.7915 14.88 74.2981 14.4867 74.6981 13.7C75.0981 12.9133 75.2981 11.6267 75.2981 9.84C75.2981 8.05333 75.0981 6.76667 74.6981 5.98C74.2981 5.18 73.7915 4.78 73.1781 4.78ZM84.39 4.38C84.8833 4.38 85.3367 4.44 85.75 4.56C86.1767 4.66667 86.5433 4.82 86.85 5.02C87.17 5.22 87.4233 5.47333 87.61 5.78C87.7967 6.07333 87.89 6.4 87.89 6.76C87.89 7.2 87.7567 7.55333 87.49 7.82C87.2233 8.08667 86.89 8.22 86.49 8.22C86.0767 8.22 85.7367 8.1 85.47 7.86C85.2167 7.62 85.09 7.3 85.09 6.9C85.09 6.51333 85.2033 6.19333 85.43 5.94C85.6567 5.68667 85.93 5.52 86.25 5.44C86.13 5.26667 85.9433 5.12667 85.69 5.02C85.4367 4.9 85.1567 4.84 84.85 4.84C84.45 4.84 84.09 4.94667 83.77 5.16C83.45 5.36 83.17 5.66667 82.93 6.08C82.7033 6.48 82.5233 6.98 82.39 7.58C82.27 8.16667 82.21 8.84667 82.21 9.62C82.21 10.7 82.3367 11.5533 82.59 12.18C82.8567 12.8067 83.1967 13.2533 83.61 13.52C84.0233 13.7733 84.4633 13.9 84.93 13.9C85.21 13.9 85.51 13.8467 85.83 13.74C86.15 13.6333 86.4633 13.4533 86.77 13.2C87.09 12.9467 87.3767 12.5867 87.63 12.12L88.01 12.26C87.8633 12.7267 87.6233 13.1933 87.29 13.66C86.97 14.1267 86.55 14.5133 86.03 14.82C85.51 15.1267 84.8767 15.28 84.13 15.28C83.2767 15.28 82.5033 15.0867 81.81 14.7C81.1167 14.3 80.5633 13.7 80.15 12.9C79.75 12.1 79.55 11.1067 79.55 9.92C79.55 8.74667 79.7567 7.75333 80.17 6.94C80.5833 6.11333 81.1567 5.48 81.89 5.04C82.6367 4.6 83.47 4.38 84.39 4.38Z" fill="#00AC66"/>
                </svg>
            </div>
        </div>
        
        <nav role="navigation" class="main-nav">
            <div class="main-nav-1">
                <a class="nav-link" href="index.php?action=home">Accueil</a>
                <a class="nav-link" href="index.php?action=gallery">Nos livres à l'échange</a>
            </div>
            <div class="main-nav-2">

                <?php if ($_SESSION){ ?>
                    
                <div class="nav-link">
                    <!--icone messaging-->
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5342 10.8594L12.3182 11.0439L12.4441 11.2822V12.7332L11.1804 12.0036L11.0119 11.8558L10.8037 11.9494C9.81713 12.3931 8.6938 12.645 7.5 12.645C3.50458 12.645 0.355 9.84779 0.355 6.5C0.355 3.15221 3.50458 0.355 7.5 0.355C11.4954 0.355 14.645 3.15221 14.645 6.5C14.645 8.19467 13.8458 9.73885 12.5342 10.8594ZM11.1765 12.0014C11.1765 12.0014 11.1766 12.0014 11.1766 12.0014L11.1765 12.0014L11.1765 12.0014Z" stroke="#292929" stroke-width="0.71"/>
                    </svg>
                    <a href="index.php?action=messaging">Messagerie</a>
                    <div class="icone-message-count">
                        <?php echo $params['messageCount']; ?>
                    </div>
                </div>
                <div class="nav-link">
                    <!--icone user-->
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="path-1-inside-1_6076_329" fill="white">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.42801 9.28571C7.99219 9.28571 10.0709 7.20704 10.0709 4.64286C10.0709 2.07868 7.99219 0 5.42801 0C2.86383 0 0.785156 2.07868 0.785156 4.64286C0.785156 7.20704 2.86383 9.28571 5.42801 9.28571ZM5.42801 9.28571C2.86383 9.28571 0.785156 10.1172 0.785156 11.1429C0.785156 12.1685 2.86383 13 5.42801 13C7.99219 13 10.0709 12.1685 10.0709 11.1429C10.0709 10.1172 7.99219 9.28571 5.42801 9.28571Z"/>
                        </mask>
                        <path d="M9.36087 4.64286C9.36087 6.81491 7.60007 8.57571 5.42801 8.57571V9.99571C8.38431 9.99571 10.7809 7.59916 10.7809 4.64286H9.36087ZM5.42801 0.71C7.60007 0.71 9.36087 2.4708 9.36087 4.64286H10.7809C10.7809 1.68656 8.38431 -0.71 5.42801 -0.71V0.71ZM1.49516 4.64286C1.49516 2.4708 3.25596 0.71 5.42801 0.71V-0.71C2.47171 -0.71 0.0751563 1.68656 0.0751563 4.64286H1.49516ZM5.42801 8.57571C3.25596 8.57571 1.49516 6.81491 1.49516 4.64286H0.0751563C0.0751563 7.59916 2.47171 9.99571 5.42801 9.99571V8.57571ZM5.42801 8.57571C4.07872 8.57571 2.82447 8.79318 1.88133 9.17044C1.41173 9.35828 0.984055 9.59971 0.662168 9.90412C0.338782 10.2099 0.0751563 10.6283 0.0751563 11.1429H1.49516C1.49516 11.1387 1.49538 11.1236 1.51157 11.0919C1.52924 11.0574 1.56597 11.0038 1.63786 10.9358C1.78586 10.7959 2.03811 10.6371 2.4087 10.4889C3.14595 10.194 4.21313 9.99571 5.42801 9.99571V8.57571ZM0.0751563 11.1429C0.0751563 11.6574 0.338783 12.0758 0.662168 12.3816C0.984055 12.686 1.41173 12.9274 1.88133 13.1153C2.82447 13.4925 4.07872 13.71 5.42801 13.71V12.29C4.21313 12.29 3.14595 12.0917 2.4087 11.7968C2.03811 11.6486 1.78586 11.4898 1.63786 11.3499C1.56597 11.2819 1.52924 11.2283 1.51157 11.1938C1.49538 11.1621 1.49516 11.147 1.49516 11.1429H0.0751563ZM5.42801 13.71C6.77731 13.71 8.03156 13.4925 8.9747 13.1153C9.4443 12.9274 9.87197 12.686 10.1939 12.3816C10.5172 12.0758 10.7809 11.6574 10.7809 11.1429H9.36087C9.36087 11.147 9.36064 11.1621 9.34445 11.1938C9.32679 11.2283 9.29005 11.2819 9.21817 11.3499C9.07017 11.4898 8.81791 11.6486 8.44732 11.7968C7.71008 12.0917 6.6429 12.29 5.42801 12.29V13.71ZM10.7809 11.1429C10.7809 10.6283 10.5172 10.2099 10.1939 9.90412C9.87197 9.59971 9.4443 9.35828 8.9747 9.17044C8.03156 8.79318 6.77731 8.57571 5.42801 8.57571V9.99571C6.6429 9.99571 7.71008 10.194 8.44732 10.4889C8.81791 10.6371 9.07017 10.7959 9.21817 10.9358C9.29005 11.0038 9.32679 11.0574 9.34445 11.0919C9.36064 11.1236 9.36087 11.1387 9.36087 11.1429H10.7809Z" fill="#292929" mask="url(#path-1-inside-1_6076_329)"/>
                    </svg>
                    <a href="index.php?action=userinfo">Mon compte</a>
                </div>
                <?php }?>
                <div class="nav-link">
                    <a href="index.php?action=connection"><strong>Connexion</strong></a>
                </div>
            </div>
        </nav>
    </header>

    <main>    
        <?= $content /* Display in the page the content of the view. */ ?>
    </main>
    
    <footer>
        <nav class="nav-footer">
            <a href="#">Politique de confidentialité</a>
            <a href="#">Mentions légales</a>
            <a href="#">Tom Troc<i class="fa-regular fa-copyright"></i></a>

        </nav>
        <div>
            <!--Logo TT green -->
            <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.595655 7.51205C0.643482 7.08957 0.667396 6.50368 0.667396 5.75439C0.667396 4.32754 0.611597 2.70937 0.5 0.899902C2.05439 0.94773 4.72476 0.971644 8.5111 0.971644C12.2815 0.971644 14.9399 0.94773 16.4863 0.899902C16.3747 2.70937 16.3189 4.32754 16.3189 5.75439C16.3189 6.50368 16.3428 7.08957 16.3907 7.51205H15.8287C15.2946 5.36778 14.6011 3.82535 13.7482 2.88474C12.9033 1.93616 11.9905 1.46187 11.0101 1.46187H10.9862V15.4753C10.9862 16.1608 11.0539 16.659 11.1894 16.9699C11.3329 17.2808 11.588 17.4881 11.9547 17.5917C12.3214 17.6953 12.9033 17.7471 13.7004 17.7471V18.2374C11.4047 18.1895 9.61511 18.1656 8.33174 18.1656C7.17591 18.1656 5.49797 18.1895 3.29791 18.2374V17.7471C4.09503 17.7471 4.67693 17.6953 5.04361 17.5917C5.41028 17.4881 5.66138 17.2808 5.79689 16.9699C5.94037 16.659 6.01211 16.1608 6.01211 15.4753V1.46187H5.9882C4.99179 1.46187 4.07112 1.93218 3.22616 2.87278C2.38918 3.80542 1.69967 5.35184 1.15763 7.51205H0.595655Z" fill="#00AC66"/>
                <path d="M16.9209 15.6746C16.9687 15.2522 16.9926 14.6663 16.9926 13.917C16.9926 12.4901 16.9368 10.872 16.8252 9.0625C18.3796 9.11033 21.05 9.13424 24.8363 9.13424C28.6067 9.13424 31.2651 9.11033 32.8115 9.0625C32.6999 10.872 32.6441 12.4901 32.6441 13.917C32.6441 14.6663 32.668 15.2522 32.7159 15.6746H32.1539C31.6198 13.5304 30.9263 11.9879 30.0734 11.0473C29.2284 10.0988 28.3157 9.62447 27.3353 9.62447H27.3114V23.6379C27.3114 24.3234 27.3791 24.8216 27.5146 25.1325C27.6581 25.4434 27.9132 25.6507 28.2799 25.7543C28.6465 25.8579 29.2284 25.9097 30.0256 25.9097V26.4C27.7299 26.3521 25.9403 26.3282 24.6569 26.3282C23.5011 26.3282 21.8232 26.3521 19.6231 26.4V25.9097C20.4202 25.9097 21.0021 25.8579 21.3688 25.7543C21.7355 25.6507 21.9866 25.4434 22.1221 25.1325C22.2656 24.8216 22.3373 24.3234 22.3373 23.6379V9.62447H22.3134C21.317 9.62447 20.3963 10.0948 19.5514 11.0354C18.7144 11.968 18.0249 13.5144 17.4828 15.6746H16.9209Z" fill="#00AC66"/>
            </svg>
        </div>
    </footer>

</body>
</html>