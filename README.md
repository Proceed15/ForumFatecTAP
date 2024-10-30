<h1>Forum-GameDev</h1>

> Status: Developing ⚠️

<h3>Welcome to the GameDev Forum project! This platform is designed to bring together game developers, enthusiasts, and industry professionals to share knowledge, discuss trends, and collaborate on game development projects.</h3>

<h2>Features</h2>
+ Login
+ Register
+ Delete User
+ Edit User
<h2>Project Overview</h2>
    <p>This project is a discussion forum developed using the Laravel framework. The goal is to provide a platform where users can register, create topics, make posts, and interact with other users.</p>

<h2>Functional Pages</h2>
    <ol>
        <li><strong>Home Page</strong>
            <ul>
                <li>A simple welcome page with links for login and registration.</li>
            </ul>
        </li>
        <li><strong>Users</strong>
            <ul>
                <li>Registration form for new users to sign up with their name, email, and password.</li>
            </ul>
        </li>
        <li><strong>Profile</strong>
            <ul>
                <li>Allows users to edit their information and delete their accounts.</li>
            </ul>
        </li>
        <li><strong>Login System</strong>
            <ul>
                <li>Login form for users to access restricted features.</li>
            </ul>
        </li>
        <li><strong>Logout</strong>
            <ul>
                <li>Function to end the user's session.</li>
            </ul>
        </li>
        <li><strong>Readme (GitHub)</strong>
            <ul>
                <li>Explanation of the project and team members (if in a pair).</li>
            </ul>
        </li>
    </ol>

<h2>Non-Functional Pages (Route -> Controller -> View)</h2>
    <ol>
        <li><strong>Home Page</strong>
            <ul>
                <li>Reserved areas for topics, posts, etc.</li>
            </ul>
        </li>
        <li><strong>Topic</strong>
            <ul>
                <li>Features to create, edit, view, and delete topics.</li>
            </ul>
        </li>
        <li><strong>Posts</strong>
            <ul>
                <li>Features to create, edit, view, and delete posts.</li>
            </ul>
        </li>
        <li><strong>Tags</strong>
            <ul>
                <li>Features to create, edit, view, and delete tags.</li>
            </ul>
        </li>
        <li><strong>Users (Moderation)</strong>
            <ul>
                <li>Features to suspend and ban users.</li>
            </ul>
        </li>
    </ol>

<h2>Functional Requirements</h2>
    <h3>1. User Registration</h3>
    <ul>
        <li>Registration form with fields for name, email, and password.</li>
        <li>Field validation (name required, valid email, and password with a minimum of 8 characters).</li>
        <li>Secure storage of passwords using hashing.</li>
        <li>User feedback in case of validation errors.</li>
    </ul>

<h3>2. User Login</h3>
    <ul>
        <li>Login form with fields for email and password.</li>
        <li>Field validation (email required, password required).</li>
        <li>Verification of login credentials.</li>
        <li>Redirect authenticated users to the home page.</li>
        <li>User feedback in case of authentication failure.</li>
    </ul>

<h3>3. Home Page</h3>
    <ul>
        <li>Accessible to all users (authenticated and non-authenticated).</li>
        <li>Display a personalized welcome message with the user's name.</li>
    </ul>

<h3>4. Logout</h3>
    <ul>
        <li>Function to end the user's session.</li>
        <li>Redirect to the home page after logout.</li>
    </ul>

<h2>Project Structure</h2>
    <p>The project follows the MVC (Model-View-Controller) pattern:</p>
    <ul>
        <li><strong>Models</strong>
            <ul>
                <li>Definition of classes responsible for database interaction, such as the User model.</li>
            </ul>
        </li>
        <li><strong>Views</strong>
            <ul>
                <li>Blade files for rendering the registration, login, and dashboard pages.</li>
            </ul>
        </li>
        <li><strong>Controllers</strong>
            <ul>
                <li>Classes that manage business logic, including user authentication and registration.</li>
            </ul>
        </li>
    </ul>

<h2>Technologies Used</h2>
    <ul>
        <li><strong>Framework:</strong> Laravel</li>
        <li><strong>Language:</strong> PHP</li>
        <li><strong>Database:</strong> MySQL</li>
        <li><strong>Authentication:</strong> Laravel's standard authentication package</li>
    </ul>
<h2>Members:</h2>
<ul>
<li>Gabriel Sales Dorea</li>
<li>João Vitor Perez Saraiva</li> 
</ul>
