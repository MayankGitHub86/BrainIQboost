This repository contains the codebase for **BrainBoost IQ**, a web application designed to help users discover and understand their cognitive abilities through professionally designed IQ tests.

## Features:

  * **User Authentication**: Secure login and signup functionalities allow users to create and manage their accounts.
  * **Database Management**: The `create_database.php` script automatically sets up the necessary `brainboost_db` database, including `users` and `test_results` tables, ensuring robust data storage.
  * **Interactive Homepage**: The `firstindex.php` serves as the initial landing page for guests, while `indexCa2.php` is the main homepage for logged-in users. Both feature:
      * A responsive navigation bar for easy site navigation.
      * A dynamic welcome section that greets logged-in users by their username.
      * An engaging image slider.
      * Sections highlighting the benefits of the IQ test ("Why Choose Our IQ Test?") and key statistics about the platform.
      * Call-to-action buttons for starting a free test or learning more.
  * **Frequently Asked Questions (FAQ)**: Dedicated FAQ pages (`Faq.php`, `Faq2.php`, `Faq3.php`) provide answers to common queries in an interactive, expandable format.
  * **Legal & Privacy**:
      * **Cookie Policy**: `cookiesp.php` and `cookiesp2.php` display a modal detailing the website's cookie usage.
      * **Privacy Policy** and **Terms of Service**: Links to these pages are available in the footer of the main index pages, ensuring transparency and legal compliance.
  * **User Experience**:
      * The application utilizes external CSS files (`firststyle.css` and `styleCA2.css`) and Google Fonts for a consistent and appealing design.
      * Boxicons are employed for modern and scalable icons.
      * Smooth scrolling to "About" and "Contact" sections enhances navigation.

## Technologies Used:

  * **PHP**: Used for server-side scripting, session management, and database interactions.
  * **MySQL**: The relational database used to store user information and test results.
  * **HTML5**: Provides the structural foundation for all web pages.
  * **CSS3**: Manages the styling and layout of the application, including responsive design elements.
  * **JavaScript**: Powers interactive elements such as the image slider, tab switching in the authentication forms, and the accordion-style FAQ sections.

 use local php zamp
   
