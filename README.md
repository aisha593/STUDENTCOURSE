Project Documentation: Laravel CRUD Application with Relational Database
Project Title: Laravel: CRUD Application with Relational Database

1. Project Overview
The goal of this project was to create a Laravel-based CRUD application for managing students and their courses. The application allows administrators to perform basic CRUD operations (Create, Update, Delete) on students and courses, with additional functionality to enroll students in multiple courses using a many-to-many relationship.
This project utilizes Laravel's Eloquent ORM for seamless database interactions and applies basic validation for user inputs to ensure data integrity.
Additionally, Preline UI is used for modern UI components, providing a polished and responsive user experience.

2. Features Implemented
1.	Student Management:
•	Add Student: Administrators can create new student records with essential details such as name, email, and phone number.
•	Edit Student: Administrators can update student information, including name, email, and phone number.
•	Delete Student: Administrators can remove student records from the system.
•	List Students: A listing page to view all students stored in the database.
2.	Course Management:
•	Add Course: Administrators can add new courses by providing course name and description.
•	Edit Course: Administrators can modify course details such as name and description.
•	Delete Course: Administrators can delete courses from the system.
•	List Courses: A listing page to view all available courses.

3.	Student Enrollment in Courses:
•	Enroll Students in Courses: Multiple students can be enrolled in a course, using a many-to-many relationship. This functionality is facilitated via a pivot table (course student), which connects students and courses
.
3.Database Design
The database consists of three primary tables: students, courses, and a pivot table course student to represent the many-to-many relationship between students and courses.
1.	Students Table:
•	id: Integer, Primary Key
•	name: String, required
•	name: String, required
•	email: String, unique, required
•	phone: String, optional
•	created_at: Timestamp
•	updated_at: Timestamp

2.	Courses Table:
•	id: Integer, Primary Key
•	name: String, required
•	description: Text, optional
•	created_at: Timestamp
•	updated_at: Timestamp
•	Course_Student Pivot Table:
•	student_id: Integer, Foreign Key (References students.id)
•	course_id: Integer, Foreign Key (References courses.id)
•	created_at: Timestamp.


4. Project Setup and Installation
To set up this project locally, follow these steps:
1.	Clone the repository (if applicable):
•	Copy code
      git clone <repository-url>
             cd <project-directory>
2.	Install dependencies: Run the following command to install the necessary PHP and JavaScript dependencies:
•	Copy code
      composer install
     npm install
3.	Set up environment variables: 
•	Copy the .env.example file to .env and update your database settings.
             cp .env.example .env
4.	Generate Application Key:
              php artisan key: generate
5.	Run Migrations: To create the necessary tables in your database:
php artisan migrate
6.	Compile Frontend Assets
•	Since Preline UI is a frontend framework based on Tailwind CSS, you'll need to compile the frontend assets using npm. This will make sure the Preline UI components (like buttons, modals, etc.) are styled correctly and the JavaScript components work as expected.
•	First, make sure you have the Preline UI CSS and JavaScript already installed (which should have been done during the npm install step).
•	Now, compile the assets using;
npm run dev

:

 5.Validation and Data Integrity
•	The application implements basic input validation for all forms:
1.Student Validation:
•	Name: Required and must be a string.
•	Email: Required, must be a valid email address, and unique in the database.
•	Phone: Optional and must be a string if provided.
      2.Course Validation:
•	Course Name: Required and must be a string.
•	Course Description: Optional but must be a string if provided.

Example of student creation validation:
$request->validate([
    'name' => 'required|string',
    'email' => 'required|email|unique:students,email',
    'phone' => 'nullable|string',
6. Eloquent ORM Usage
•	The application utilizes Laravel’s Eloquent ORM to manage database interactions.
1.	Student Model:
The Student model is used to interact with the students table and define the relationship to the courses table via a many-to-many relationship.
public function courses()
{
    return $this->belongsToMany(Course::class, 'course_student');
}
2.	Course Model:
The Course model interacts with the courses table and defines the inverse relationship to the students table.
public function students()
{
    return $this->belongsToMany(Student::class, 'course_student');
}
7. Routes and Controllers
•	The routes for managing students and courses are defined in web.php. The resource controllers handle the logic for creating, editing, deleting, and listing students and courses.
Example of defining routes:
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
StudentController Example:
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(5);
        
        return view('courses.index',compact('courses'));
    }

    
8.  User Interface (Views)
The user interface is built using Laravel Blade templates. It provides forms to manage students and courses.
Example Blade View for Creating Students:
@extends('layouts.app')
@section('content')
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
            </form>
        
@endsection

9. Testing
•	The application includes tests to verify the functionality of CRUD operations for students and courses.
•	Example of a test for creating a student:
public function test_create_student()
{
    $response = $this->post('/students', [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '1234567890',
    ]);

    $response->assert Redirect('/students');
    $this->assertDatabaseHas('students', ['email' => 'johndoe@example.com']);
}
10. Conclusion
•	This Laravel CRUD application allows for efficient management of students and courses, providing an intuitive interface for administrators. By using Laravel’s Eloquent ORM, many-to-many relationships are handled seamlessly, ensuring that students can be easily enrolled in multiple courses. The project also includes proper validation to ensure the integrity of user input.



