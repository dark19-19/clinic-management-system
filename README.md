# Clinic Management System
<p>A laravel management system project, I made the back-end for every model and made the admin's controlling systemt, admins can control all of the website and they can see every thing stored in the database.</p>
<h3>** Explaining intorduction:</h3>
First, this website is used to manage patients, doctors or pharmacists or other staff, appointments, medicines stord, and other things in a medical center which has clinics and pharmacies.
Then, I will explain how the website works, first of all, there is an admin account registered as default in the system to make the experience be easier.
<div>
  <p>Admin's account:</p>
  <p>Email: dark.officail@clin.de</p>
  <p>Password: 123456789</p>
</div>
<p>
  If a non-patient user registers he will get an interface which shows an article and some FAQs, but the most important thing is the booking an appointment form, he can book an appointment and it will be stored in it's table in the database which is different from the patient's appointments, the reponsible employee or the admin apporve it with signing a doctor to this appointment or not depending on the scheduales, then it will be approved and when the user gets into the center for their appointment, the reciptionist or the admin could store his data as a patient whereis the email is the most important in this operation, which is the user should give the registered email to the responsible employee to access their user-data.
</p>
<p>
  After that the user gets into the clinic where it's assigned to them as the resbonsible employee aprroved the appointment to see the doctor and get checkedup,  then the doctor writes a medical record and assign it to the patient and the appointment, after this the doctor write a prescription and assign it to the medical record and assign a medicine to it.
</p>
<p>
  After the checkup ends, the patient goes to the cashier and pay for the appointment, and the cashier or an admin register a payment assigned to the patient and the appointment and there is many methods to pay depends on the center.
</p>
<h3>** Some rules and instructions:</h3>
<p>
  <ol>
    <li>Admins and responsible employees can check the appointments and apporove or reject or delete a canceled appointment.</li>
    <li>Admins and doctors can show the medical records and the prescriptions.</li>
    <li>Admins and pharmacists can store or edit a medicine.</li>
    <li>Admins and responsible employees can register a payment.</li>
    <li>Admins only can apply a doctor or pharmacist or employee and store thier data.</li>
    <li>Admins and reciptionists can store a new patient data.</li>
  </ol>
</p>
<h3>** Insructions to try the website:</h3>
<p>
  <ol>
    <h4>To run the project</h4>
    <li>Pull the project to your device.</li>
    <li>Turn on the XAMPP, then turn on Apache and MySQL.</li>
    <li>Make a database with the name: ( clinic_management ).</li>
    <li>Then go to the project in your text editor, open the terminal and run the migrations and the seeders.</li>
    <li>Then type this in the terminal ( npm run dev ) to run the vite and the styles.</li>
    <li>Finally, run the command in the terminal ( php artisan ser ) to run the project, then click on the link.</li>
  </ol>
  <ul>
    <h4>To use it correctly</h4>
    <li>Register 3 or 4 accounts with different emails.</li>
    <li>With the first account you can either go and book a user-appointment or you can login with the admin email and store the first account as a patient.</li>
    <li>If you booked an appointment as a user, move to the next step, but if you stored the user as a patient you should go to the phpmyadmin and store an appointment for this patient (At the end i wrote why you shold do this).</li>
    <li>Go login with the admin account.</li>
    <li>Now go to the second account and apply it as a doctor with the specialization you want.</li>
    <li>Now add some medicines (You can ask the AI to give you some examples).</li>
    <li>Now go and approve or reject the appointment you've booked.</li>
    <li>When you approve in the real work you should choose the doctor with the correct specialization, but here it's just for testing.</li>
    <li>Approve the appointment by assinging the doctor and checking the schedule.</li>
    <li>And now go to the doctor account and type in the url ( http://127.0.0.1: {port}{8000} /record/create ) to store a medical record.</li>
    <li>Them in the url ( http://127.0.0.1: {port}{8000} /prescription/create ) to create a prescription and assign it to the medical record.</li>
    <li>Now go back to the admin's account and check what you've done in the tabs.</li>
    <li>You can test the other features, the same way.</li>
  </ul>
</p>
<h4>Important info:</h4>
<p>
  I made this website just for educational purpose, i made only the admin's interface and it's the most important i didn't complete other pages like patient's pages or doctor's
  pages or pages for the staff,  thats why you should somewhere type in the url not just by clicking.
</p>
<p>
  I made also a logging system that stores every operation made i the website and only admins can see this.
</p>
