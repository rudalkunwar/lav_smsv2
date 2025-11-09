# LAVSMS Complete Functional Guide

> **A comprehensive guide to understanding how LAVSMS works, who does what, and how users interact with the system**

---

## Table of Contents

-   [System Overview](#system-overview)
-   [User Roles & Capabilities](#user-roles--capabilities)
-   [Functional Requirements](#functional-requirements)
-   [User Workflows](#user-workflows)
-   [System Interactions](#system-interactions)
-   [Module Breakdown](#module-breakdown)
-   [Data Flow Diagrams](#data-flow-diagrams)
-   [Business Rules](#business-rules)

---

## System Overview

### What is LAVSMS?

**LAVSMS (Laravel School Management System)** is a comprehensive web-based platform designed to digitize and streamline all academic, administrative, and financial operations of educational institutions.

### Purpose

The system serves as a **centralized hub** where:

-   **Administrators** manage institutional operations
-   **Teachers** handle academic activities
-   **Accountants** track financial transactions
-   **Librarians** manage library resources
-   **Students** access their academic information
-   **Parents** monitor their children's progress

### Core Philosophy

**Role-Based Access Control (RBAC)** - Each user sees only what they need to see and can do only what they're authorized to do.

---

## User Roles & Capabilities

### Role Hierarchy

```
┌─────────────────────────────────────────┐
│           SUPER ADMIN                   │
│     (Complete System Control)           │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
┌───────▼────────┐   ┌─────▼──────────────┐
│     ADMIN      │   │   SPECIALIZED      │
│  (Management)  │   │     ROLES          │
└───────┬────────┘   └─────┬──────────────┘
        │                  │
        │         ┌────────┼────────┬────────┐
        │         │        │        │        │
        │    ┌────▼───┐ ┌──▼───┐ ┌─▼─────┐ │
        │    │Teacher │ │Acct. │ │Librar.│ │
        │    └────────┘ └──────┘ └───────┘ │
        │                                   │
    ┌───▼────────────────────────────────┐ │
    │      END USERS                     │ │
    │   (Students & Parents)             ◄─┘
    └────────────────────────────────────┘
```

---

## Functional Requirements

### FR-001: Student Management

#### Who Can Do This?

-   **Super Admin**: Full CRUD operations
-   **Admin**: Create, Read, Update (cannot delete)
-   **Teacher**: Read only (own class students)
-   **Student**: Read only (own profile)
-   **Parent**: Read only (own child's profile)

#### What Can Be Done?

**1. Student Admission (Admin/Super Admin)**

-   Register new student
-   Assign admission number (auto-generated)
-   Assign to class and section
-   Upload student photograph
-   Record parent/guardian details
-   Set student status (active/inactive)

**2. Student Profile Management**

-   Update personal information
-   Update contact details
-   Update academic information
-   Upload/change photo
-   View academic history

**3. Student Transfer**

-   Transfer between sections
-   Transfer between classes
-   Generate transfer certificate

**4. Student Graduation**

-   Mark students as graduated
-   Archive graduated student records
-   Generate completion certificates

#### Data Captured

```
Student Record:
├── Personal Info
│   ├── Full Name
│   ├── Date of Birth
│   ├── Gender
│   ├── Blood Group
│   ├── Nationality
│   ├── State/LGA
│   └── Photo
├── Contact Info
│   ├── Address
│   ├── Phone
│   └── Email
├── Parent/Guardian Info
│   ├── Parent Name
│   ├── Parent Phone
│   ├── Parent Email
│   └── Parent Occupation
└── Academic Info
    ├── Admission Number
    ├── Admission Date
    ├── Current Class
    ├── Current Section
    ├── Year Admitted
    └── Student Status
```

#### Business Rules

-   Admission number must be unique
-   Student must be assigned to one class and one section
-   Age must be appropriate for class level
-   Parent contact information is mandatory
-   Photo upload is optional but recommended

---

### FR-002: Class & Section Management

#### Who Can Do This?

-   **Super Admin**: Full CRUD operations
-   **Admin**: Create, Read, Update
-   **Teacher**: Read only (assigned classes)
-   **Student/Parent**: Read only (own class)

#### What Can Be Done?

**1. Class Management**

-   Create new class (e.g., Grade 1, Grade 2, JSS 1)
-   Define class type (Nursery, Primary, Secondary)
-   Set class capacity
-   Assign class teacher
-   Archive/deactivate old classes

**2. Section Management**

-   Create sections within a class (e.g., A, B, C)
-   Set section capacity
-   Assign students to sections
-   Move students between sections
-   Assign teachers to sections

**3. Class Configuration**

-   Define subjects for each class
-   Set promotion criteria
-   Configure assessment structure

#### Data Structure

```
Class:
├── Class Name (e.g., "Grade 5")
├── Class Type (Nursery/Primary/Secondary)
├── Capacity
├── Class Teacher (assigned)
├── Sections
│   ├── Section A
│   │   ├── Capacity
│   │   ├── Students (list)
│   │   └── Teachers (assigned)
│   └── Section B
└── Subjects
    ├── Mathematics
    ├── English
    └── Science
```

#### Business Rules

-   A class must have at least one section
-   Section capacity cannot exceed class capacity
-   Students cannot be assigned to multiple sections simultaneously
-   Class teacher must be a user with "Teacher" role

---

### FR-003: Subject Management

#### Who Can Do This?

-   **Super Admin**: Full CRUD operations
-   **Admin**: Create, Read, Update
-   **Teacher**: Read only (assigned subjects)

#### What Can Be Done?

**1. Subject Creation**

-   Create new subject
-   Define subject code
-   Set subject type (Core/Elective)
-   Assign to classes

**2. Subject Assignment**

-   Assign subject to specific classes
-   Assign teacher to subject
-   Set subject weightage for grading

**3. Subject Configuration**

-   Define assessment components
-   Set pass marks
-   Configure grading scale

#### Data Structure

```
Subject:
├── Subject Name (e.g., "Mathematics")
├── Subject Code (e.g., "MATH101")
├── Subject Type (Core/Elective)
├── Classes (where taught)
├── Teachers (assigned)
└── Assessment Configuration
    ├── Continuous Assessment (40%)
    ├── Examination (60%)
    └── Pass Mark (40%)
```

---

### FR-004: Examination Management

#### Who Can Do This?

-   **Super Admin**: Full control
-   **Admin**: Create and manage exams
-   **Teacher**: Enter marks for assigned subjects
-   **Student**: View own results
-   **Parent**: View child's results

#### What Can Be Done?

**1. Exam Creation (Admin)**

```
Process Flow:
1. Navigate to Exams → Create Exam
2. Enter exam details
   ├── Exam Name (e.g., "First Term Examination")
   ├── Exam Type (Mid-term/Final/Mock)
   ├── Academic Year
   └── Term/Semester
3. Click Submit
4. Exam is created and appears in exam list
```

**2. Mark Entry (Teacher)**

```
Process Flow:
1. Navigate to Exams → Enter Marks
2. Select:
   ├── Exam
   ├── Class
   ├── Section
   └── Subject (only assigned subjects visible)
3. System displays student list
4. Enter marks for each student
   ├── Continuous Assessment (CA)
   ├── Examination Score
   └── Total (auto-calculated)
5. Submit marks
6. System validates and saves
```

**3. Result Processing**

```
Automatic Calculations:
├── Total Score = CA + Exam Score
├── Grade Assignment (based on grading scale)
├── Position in Class (ranking)
├── Subject Average
└── Overall Average
```

**4. Marksheet Generation**

```
Available Formats:
├── Individual Student Marksheet (PDF)
├── Class Marksheet (all students)
├── Subject Performance Report
└── Tabulation Sheet (class overview)
```

#### Data Flow: Exam Process

```
┌─────────────┐
│ Admin       │
│ Creates Exam│
└──────┬──────┘
       │
       ▼
┌─────────────────┐
│ Exam Record     │
│ Created         │
└──────┬──────────┘
       │
       ▼
┌─────────────────┐
│ Teachers        │
│ Enter Marks     │
└──────┬──────────┘
       │
       ▼
┌─────────────────┐
│ System          │
│ Calculates:     │
│ - Totals        │
│ - Grades        │
│ - Positions     │
└──────┬──────────┘
       │
       ▼
┌─────────────────┐
│ Results         │
│ Published       │
└──────┬──────────┘
       │
       ├─────────────┐
       │             │
       ▼             ▼
┌──────────┐   ┌──────────┐
│ Students │   │ Parents  │
│ View     │   │ View     │
└──────────┘   └──────────┘
```

#### Business Rules

-   Marks cannot exceed maximum marks
-   All subjects must have marks entered before result publication
-   Once published, marks can only be edited by Super Admin
-   Students ranked by total score in descending order
-   Grade calculated based on predefined grading scale
-   Minimum pass percentage: 40% (configurable)

---

### FR-005: Grading System

#### Who Can Do This?

-   **Super Admin**: Configure grading scales
-   **Admin**: View and apply grading scales
-   **System**: Auto-calculate grades

#### What Can Be Done?

**1. Grade Configuration**

```
Example Grading Scale:

Score Range  │ Grade │ Remark
─────────────┼───────┼────────────────
90 - 100     │  A+   │ Excellent
80 - 89      │  A    │ Very Good
70 - 79      │  B    │ Good
60 - 69      │  C    │ Credit
50 - 59      │  D    │ Pass
40 - 49      │  E    │ Fair
0  - 39      │  F    │ Fail
```

**2. Grade Application**

-   System automatically assigns grade based on total score
-   Supports multiple grading systems (percentage/letter/points)
-   Configurable per exam type or class level

---

### FR-006: Payment Management

#### Who Can Do This?

-   **Super Admin**: Full control + delete payments
-   **Admin**: View all payments
-   **Accountant**: Create, Read, Update payments
-   **Student**: View own payments
-   **Parent**: View child's payments

#### What Can Be Done?

**1. Payment Type Configuration**

```
Common Payment Types:
├── Tuition Fee
├── Library Fee
├── Sports Fee
├── Laboratory Fee
├── Examination Fee
├── Transport Fee
├── Uniform Fee
└── Miscellaneous
```

**2. Payment Recording Process**

```
Flow:
1. Accountant logs in
2. Navigate to Payments → Record Payment
3. Select Student
4. Select Payment Type
5. Enter:
   ├── Amount Paid
   ├── Payment Method (Cash/Bank/Online)
   ├── Reference Number
   └── Payment Date
6. Submit
7. System generates receipt
8. Receipt can be printed/downloaded (PDF)
```

**3. Payment Receipt**

```
Receipt Contains:
├── School Header (logo, name, address)
├── Receipt Number (unique)
├── Student Information
├── Payment Details
│   ├── Payment Type
│   ├── Amount
│   ├── Date
│   └── Payment Method
├── Received By (Accountant name)
└── School Stamp/Signature
```

**4. Payment Reports**

```
Available Reports:
├── Student Payment History
├── Daily Collection Report
├── Payment Type Summary
├── Outstanding Fees Report
├── Class-wise Collection
└── Custom Date Range Reports
```

#### Payment Data Flow

```
┌──────────────┐
│ Student/     │
│ Parent       │
│ Pays Fee     │
└──────┬───────┘
       │
       ▼
┌──────────────┐
│ Accountant   │
│ Records in   │
│ System       │
└──────┬───────┘
       │
       ▼
┌──────────────┐
│ Payment      │
│ Record       │
│ Created      │
└──────┬───────┘
       │
       ├─────────────┬──────────────┐
       │             │              │
       ▼             ▼              ▼
┌──────────┐  ┌───────────┐  ┌──────────┐
│ Receipt  │  │ Student   │  │ Reports  │
│ Generated│  │ Can View  │  │ Updated  │
└──────────┘  └───────────┘  └──────────┘
```

#### Business Rules

-   Payment record must be linked to a valid student
-   Amount must be greater than zero
-   Receipt number is auto-generated and unique
-   Payment date cannot be in the future
-   Payment records can only be deleted by Super Admin
-   All payments must specify payment method

---

### FR-007: Library Management

#### Who Can Do This?

-   **Super Admin**: Full control
-   **Admin**: View library records
-   **Librarian**: Full library operations
-   **Student**: Request books, view own issued books
-   **Teacher**: View library catalog

#### What Can Be Done?

**1. Book Management (Librarian)**

```
Add New Book:
├── Book Title
├── Author
├── ISBN Number
├── Publisher
├── Publication Year
├── Category/Subject
├── Total Copies
├── Available Copies
└── Shelf Location
```

**2. Book Issue Process**

```
Flow:
1. Student requests book (online or at library)
2. Request appears in Librarian dashboard
3. Librarian reviews request
4. If book available:
   ├── Approve request
   ├── Set due date (typically 7-14 days)
   ├── Issue book
   └── Update available copies
5. Student receives notification
6. Book status: "Issued"
```

**3. Book Return Process**

```
Flow:
1. Student returns book to library
2. Librarian:
   ├── Scans/selects book in system
   ├── Checks for damages
   ├── Calculates fine (if overdue)
   ├── Marks book as returned
   └── Updates available copies
3. If fine exists:
   ├── Fine amount calculated
   ├── Student notified
   └── Payment recorded
```

**4. Library Reports**

```
Available Reports:
├── Books Currently Issued
├── Overdue Books
├── Most Borrowed Books
├── Student Borrowing History
├── Book Inventory Report
└── Fine Collection Report
```

#### Library Data Flow

```
┌──────────────┐
│ Student      │
│ Requests Book│
└──────┬───────┘
       │
       ▼
┌──────────────────┐
│ Book Request     │
│ Created          │
└──────┬───────────┘
       │
       ▼
┌──────────────────┐
│ Librarian        │
│ Reviews Request  │
└──────┬───────────┘
       │
   ┌───┴────┐
   │        │
   ▼        ▼
┌──────┐ ┌──────┐
│Approve│ │Reject│
└───┬───┘ └───┬──┘
    │         │
    ▼         ▼
┌──────────┐ ┌──────────┐
│Book      │ │Request   │
│Issued    │ │Closed    │
└────┬─────┘ └──────────┘
     │
     │ (After due date)
     │
     ▼
┌──────────────┐
│ Student      │
│ Returns Book │
└──────┬───────┘
       │
       ▼
┌──────────────┐
│ Book Return  │
│ Processed    │
└──────┬───────┘
       │
   ┌───┴────┐
   │        │
   ▼        ▼
┌──────┐ ┌──────────┐
│On-   │ │Overdue   │
│Time  │ │(Fine)    │
└──────┘ └──────────┘
```

#### Business Rules

-   A student can borrow maximum 3 books at a time
-   Default loan period: 14 days
-   Overdue fine: $0.50 per day (configurable)
-   Damaged book fine: Full book price
-   Lost book: Student pays replacement cost + processing fee
-   Cannot request new books if having overdue books

---

### FR-008: Timetable Management

#### Who Can Do This?

-   **Super Admin**: Full control
-   **Admin**: Create and manage timetables
-   **Class Teacher**: Manage own class timetable
-   **Teacher**: View assigned periods
-   **Student**: View own class timetable
-   **Parent**: View child's class timetable

#### What Can Be Done?

**1. Timetable Creation**

```
Process:
1. Define Time Slots
   ├── Period 1: 08:00 - 08:45
   ├── Period 2: 08:45 - 09:30
   ├── Break:   09:30 - 09:45
   ├── Period 3: 09:45 - 10:30
   └── ... (continue for all periods)

2. Assign Subjects to Periods
   For each day and period:
   ├── Select Subject
   ├── Assign Teacher
   ├── Set Room/Location (optional)
   └── Add Notes (optional)

3. Publish Timetable
```

**2. Timetable Structure**

```
Weekly Timetable View:

         Mon      Tue      Wed      Thu      Fri
08:00  │ Math   │ Eng    │ Math   │ Sci    │ Eng   │
08:45  │ Eng    │ Math   │ Phy Ed │ Math   │ Sci   │
09:30  │──────────── BREAK ────────────────│
09:45  │ Sci    │ Hist   │ Eng    │ Geo    │ Math  │
...
```

**3. Timetable Modification**

-   Update subject assignment
-   Change teacher for a period
-   Swap periods
-   Mark period as free/study period
-   Cancel/reschedule classes

#### Business Rules

-   No teacher can be assigned to two classes in the same period
-   Break times are fixed and cannot have classes
-   Each subject must appear minimum required times per week
-   Timetable must be published for students to view
-   Changes to published timetable notify affected users

---

### FR-009: Promotion System

#### Who Can Do This?

-   **Super Admin**: Execute promotions
-   **Admin**: Execute promotions
-   **System**: Auto-calculate eligibility

#### What Can Be Done?

**1. Student Promotion Process**

```
Workflow:
1. End of Academic Year
2. Admin navigates to Students → Promotion
3. Select:
   ├── Current Academic Year
   ├── From Class
   └── From Section
4. System displays students with:
   ├── Student Name
   ├── Current Class
   ├── Average Score
   ├── Status (Pass/Fail)
   └── Promotion Eligibility
5. Admin reviews and selects students to promote
6. Select destination class
7. Confirm promotion
8. System:
   ├── Updates student records
   ├── Moves students to new class
   ├── Creates promotion history
   └── Sends notifications
```

**2. Promotion Criteria**

```
Automatic Eligibility Check:
├── Minimum overall average: 40%
├── No more than 2 failed subjects
├── Attendance > 75% (if tracking enabled)
└── All fees paid (configurable)
```

**3. Promotion Types**

```
Types:
├── Normal Promotion (meets all criteria)
├── Conditional Promotion (near criteria)
└── Repeat Class (failed promotion)
```

**4. Promotion History**

```
Records Maintained:
├── Student ID
├── From Class/Section
├── To Class/Section
├── Academic Year
├── Promotion Date
├── Promotion Type
└── Remarks
```

#### Promotion Data Flow

```
┌─────────────────┐
│ Academic Year   │
│ Ends            │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ System          │
│ Calculates      │
│ Eligibility     │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Admin Reviews   │
│ Student List    │
└────────┬────────┘
         │
    ┌────┴────┐
    │         │
    ▼         ▼
┌────────┐ ┌───────┐
│Promote │ │Repeat │
│        │ │       │
└───┬────┘ └───┬───┘
    │          │
    ▼          ▼
┌────────────────────┐
│ Student Records    │
│ Updated            │
│ - New Class        │
│ - New Section      │
│ - History Saved    │
└────────────────────┘
```

#### Business Rules

-   Promotion can only happen once per academic year
-   Students can only be promoted to immediate next class
-   Promotion can be rolled back only by Super Admin
-   Promoted students automatically assigned to new class sections
-   Promotion history is permanent and cannot be deleted

---

### FR-010: User Account Management

#### Who Can Do This?

-   **Super Admin**: Manage all user types
-   **Admin**: Create/manage all users except Super Admin
-   **All Users**: Manage own profile and password

#### What Can Be Done?

**1. User Creation**

```
Process:
1. Navigate to Users → Create User
2. Select User Type:
   ├── Super Admin (Super Admin only)
   ├── Admin
   ├── Teacher
   ├── Accountant
   ├── Librarian
   ├── Student (usually auto-created with admission)
   └── Parent
3. Enter User Details:
   ├── Full Name
   ├── Email (unique)
   ├── Username (unique)
   ├── Phone Number
   ├── Gender
   ├── Date of Birth
   ├── Address
   ├── Profile Photo (optional)
   └── Initial Password
4. For specific roles:
   ├── Teacher: Assign subjects and classes
   ├── Parent: Link to student(s)
   └── Student: Link to parent
5. Submit
6. User receives email with login credentials
```

**2. Profile Management**

```
Any User Can:
├── Update personal information
├── Change profile photo
├── Update contact details
└── Change password

Cannot Change:
├── User Type/Role
├── Username (after creation)
└── Email (requires admin approval)
```

**3. Password Management**

```
Password Rules:
├── Minimum 6 characters
├── Must contain letters and numbers (recommended)
└── Cannot be same as username

Password Reset:
├── User Request → Admin Approves → Reset Link Sent
└── Admin can manually reset (Super Admin/Admin only)
```

#### User Data Structure

```
User Record:
├── Authentication
│   ├── Username (unique)
│   ├── Email (unique)
│   ├── Password (hashed)
│   └── User Type ID
├── Personal Info
│   ├── Full Name
│   ├── Gender
│   ├── Date of Birth
│   ├── Phone
│   ├── Address
│   └── Photo
├── Status
│   ├── Active/Inactive
│   ├── Email Verified
│   └── Last Login
└── Role-Specific Data
    ├── Teacher → Subjects, Classes
    ├── Student → Admission, Class, Section
    ├── Parent → Linked Students
    └── Staff → Department, Designation
```

---

### FR-011: Notice Board & Calendar

#### Who Can Do This?

-   **Super Admin**: Create, edit, delete notices
-   **Admin**: Create, edit notices
-   **All Users**: View notices

#### What Can Be Done?

**1. Notice Creation**

```
Process:
1. Navigate to Notice Board → Create Notice
2. Enter:
   ├── Notice Title
   ├── Notice Content
   ├── Target Audience (All/Students/Teachers/Parents)
   ├── Priority (Normal/High/Urgent)
   ├── Valid From Date
   ├── Valid Until Date
   └── Attachments (optional)
3. Publish
4. Notice appears on:
   ├── Dashboard
   ├── Notice Board page
   └── Calendar (if date-specific)
```

**2. Notice Types**

```
Categories:
├── General Announcements
├── Holiday Notices
├── Exam Schedules
├── Fee Reminders
├── Event Notifications
├── Important Updates
└── Emergency Alerts
```

**3. Calendar Integration**

```
Events Displayed:
├── Notices (date-specific)
├── Exam Dates
├── Holidays
├── School Events
└── Payment Deadlines
```

---

### FR-012: Settings Management

#### Who Can Do This?

-   **Super Admin**: Full control over all settings
-   **Admin**: View and modify non-critical settings

#### What Can Be Done?

**1. System Settings**

```
Configurable Items:
├── School Information
│   ├── School Name
│   ├── School Code
│   ├── Address
│   ├── Phone/Email
│   ├── Website
│   └── Established Year
├── Academic Settings
│   ├── Current Session
│   ├── Current Term
│   ├── Terms per Session
│   └── Promotion Month
├── Display Settings
│   ├── School Logo
│   ├── School Letterhead
│   ├── Theme Colors
│   └── Date Format
└── System Preferences
    ├── Default Language
    ├── Timezone
    ├── Currency
    └── Pagination Limit
```

**2. Fee Configuration**

```
Payment Settings:
├── Fee Types and Amounts (per class)
├── Payment Methods Accepted
├── Late Payment Fine Rules
├── Discount Rules
└── Receipt Format
```

**3. Exam Configuration**

```
Settings:
├── Grading Scales
├── Pass Percentage
├── CA Weightage
├── Exam Weightage
└── Marksheet Template
```

---

## System Interactions

### Interaction Matrix

| Actor           | Interacts With                                     | Purpose                              |
| --------------- | -------------------------------------------------- | ------------------------------------ |
| **Super Admin** | All Users, All Data                                | System administration, oversight     |
| **Admin**       | Teachers, Students, Parents, Accountant, Librarian | User management, academic operations |
| **Teacher**     | Students, Exams, Subjects, Timetable               | Teaching, assessment, marks entry    |
| **Accountant**  | Students, Parents, Payment Records                 | Fee collection, receipt generation   |
| **Librarian**   | Students, Books, Book Requests                     | Library operations, book management  |
| **Student**     | Own Profile, Marks, Timetable, Library             | Academic progress tracking           |
| **Parent**      | Child's Profile, Marks, Payments, Teachers         | Child progress monitoring            |

---

### Common User Journeys

#### Journey 1: New Student Admission

```
┌─────────────────────────────────────────────────────┐
│ STEP 1: Parent Inquires About Admission            │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 2: Admin Creates Student Record               │
│ - Enters student details                           │
│ - Assigns class and section                        │
│ - Uploads photo                                     │
│ - System generates admission number                 │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 3: System Auto-Creates Student User Account   │
│ - Email: student@email.com                          │
│ - Password: auto-generated                          │
│ - Status: Active                                    │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 4: Admin/Accountant Configures Fee Structure  │
│ - Assigns applicable fees                          │
│ - Sets payment schedule                            │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 5: Admin Creates Parent Account               │
│ - Links to student                                 │
│ - Sends login credentials                          │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 6: Student & Parent Receive Welcome Email     │
│ - Login credentials                                │
│ - Next steps instructions                          │
└─────────────────────────────────────────────────────┘
```

#### Journey 2: Exam Result Publication

```
┌─────────────────────────────────────────────────────┐
│ STEP 1: Admin Creates Exam                         │
│ - Exam name, type, year, term                      │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 2: Physical Exams Conducted                   │
│ - Students write exams                             │
│ - Answer sheets collected                          │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 3: Teachers Mark Answer Sheets                │
│ - Manually grade papers                            │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 4: Teachers Enter Marks in System             │
│ - Login to teacher account                         │
│ - Select exam, class, subject                      │
│ - Enter CA and Exam scores                         │
│ - Submit marks                                      │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 5: System Processes Results                   │
│ - Calculates totals                                │
│ - Assigns grades                                   │
│ - Ranks students                                   │
│ - Generates statistics                             │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 6: Admin Reviews and Publishes Results        │
│ - Verifies data accuracy                           │
│ - Publishes results                                │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 7: Students & Parents Access Results          │
│ - Login to view marksheets                         │
│ - Download/Print PDF                               │
└─────────────────────────────────────────────────────┘
```

#### Journey 3: Fee Payment

```
┌─────────────────────────────────────────────────────┐
│ STEP 1: Student/Parent Checks Fee Status           │
│ - Logs in                                          │
│ - Views payment dashboard                          │
│ - Sees outstanding fees                            │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 2: Parent Makes Payment                       │
│ - Visits school/bank/online portal                │
│ - Pays fee amount                                  │
│ - Receives bank teller/transaction ID              │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 3: Accountant Records Payment in System       │
│ - Logs into accountant account                     │
│ - Selects student                                  │
│ - Enters payment details                           │
│ - Generates receipt                                │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 4: Receipt Provided to Parent                 │
│ - Print physical copy                              │
│ - Or email PDF receipt                             │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 5: Payment Visible in System                  │
│ - Student can view in payment history             │
│ - Parent can view in dashboard                     │
│ - Admin can see in reports                         │
└─────────────────────────────────────────────────────┘
```

#### Journey 4: Book Borrowing

```
┌─────────────────────────────────────────────────────┐
│ STEP 1: Student Searches Library Catalog           │
│ - Logs in                                          │
│ - Browses/searches books                           │
│ - Checks availability                              │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 2: Student Requests Book                      │
│ - Clicks "Request Book"                            │
│ - Adds request note (optional)                     │
│ - Submits request                                  │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 3: Librarian Receives Notification            │
│ - Views pending requests                           │
│ - Checks book availability                         │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 4: Librarian Approves Request                 │
│ - Approves request                                 │
│ - Sets due date                                    │
│ - Updates book status                              │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 5: Student Collects Book from Library         │
│ - Shows student ID                                 │
│ - Receives book                                    │
│ - Signs borrowing register                         │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 6: Student Uses Book                          │
│ - Reminder email 2 days before due date           │
└───────────────────┬─────────────────────────────────┘
                    │
                    ▼
┌─────────────────────────────────────────────────────┐
│ STEP 7: Student Returns Book                       │
│ - Returns to library                               │
│ - Librarian checks condition                       │
│ - If on time: No charges                           │
│ - If overdue: Fine calculated and paid             │
│ - Book status updated to "Available"               │
└─────────────────────────────────────────────────────┘
```

---

## Module Breakdown

### Module 1: Authentication & Authorization

**Purpose**: Secure access control

**Components**:

-   Login system
-   Password management
-   Session management
-   Role-based permissions

**Key Features**:

-   Multi-factor authentication support
-   Password reset via email
-   Remember me functionality
-   Activity logging

---

### Module 2: Dashboard

**Purpose**: Central information hub

**Super Admin/Admin Dashboard Shows**:

-   Total students, teachers, staff
-   Recent admissions
-   Payment collection summary
-   Exam schedules
-   Notice board
-   Calendar events
-   Quick action buttons

**Teacher Dashboard Shows**:

-   Assigned classes and subjects
-   Upcoming exams
-   Pending mark entry
-   Class schedule
-   Recent notices

**Student Dashboard Shows**:

-   Class information
-   Recent marks
-   Upcoming exams
-   Payment status
-   Library books (issued/requested)
-   Notices and events

**Parent Dashboard Shows**:

-   Child's academic summary
-   Recent marks
-   Payment status
-   Upcoming events
-   Teacher contact information

---

### Module 3: Student Management

**Sub-Modules**:

1. **Student Registration**: Admit new students
2. **Student Records**: Manage student profiles
3. **Student List**: View/search all students
4. **Promotion**: Promote students to next class
5. **Graduation**: Mark students as graduated

---

### Module 4: Academic Management

**Sub-Modules**:

1. **Class Management**: Create and manage classes
2. **Section Management**: Manage class sections
3. **Subject Management**: Define and assign subjects
4. **Timetable**: Create and manage schedules

---

### Module 5: Examination System

**Sub-Modules**:

1. **Exam Creation**: Set up exams
2. **Mark Entry**: Teachers enter marks
3. **Grade Configuration**: Set grading scales
4. **Marksheet Generation**: PDF marksheets
5. **Result Analysis**: Performance reports

---

### Module 6: Financial Management

**Sub-Modules**:

1. **Payment Types**: Configure fee categories
2. **Payment Recording**: Record fee payments
3. **Receipt Generation**: Print/PDF receipts
4. **Payment Reports**: Financial summaries
5. **Outstanding Fees**: Track pending payments

---

### Module 7: Library System

**Sub-Modules**:

1. **Book Management**: Add/edit books
2. **Book Issue**: Process book borrowing
3. **Book Return**: Process book returns
4. **Fine Management**: Calculate and collect fines
5. **Library Reports**: Borrowing statistics

---

### Module 8: User Management

**Sub-Modules**:

1. **User Creation**: Create user accounts
2. **Profile Management**: Edit user profiles
3. **Role Assignment**: Assign user roles
4. **Account Status**: Activate/deactivate accounts

---

### Module 9: Communication

**Sub-Modules**:

1. **Notice Board**: Post announcements
2. **Calendar**: Event scheduling
3. **Notifications**: System alerts (future)
4. **Messaging**: Internal messaging (future)

---

### Module 10: Reports & Analytics

**Available Reports**:

1. Student Reports
    - Class-wise student list
    - Graduated students
    - Student profiles
2. Academic Reports
    - Exam results
    - Subject performance
    - Class performance
3. Financial Reports
    - Payment collection
    - Outstanding fees
    - Income summary
4. Library Reports
    - Books issued
    - Overdue books
    - Popular books

---

## Business Rules

### Global Business Rules

1. **Data Integrity**

    - All required fields must be filled
    - Unique constraints enforced (email, admission number, etc.)
    - Foreign key relationships maintained
    - Soft deletes for critical records

2. **Security**

    - Passwords must be hashed (bcrypt)
    - CSRF protection on all forms
    - SQL injection prevention
    - XSS protection
    - Session timeout after 2 hours inactivity

3. **Validation**

    - Email addresses must be valid format
    - Phone numbers must be numeric
    - Dates cannot be in future (where applicable)
    - Scores cannot exceed maximum marks

4. **Access Control**

    - Users can only access authorized modules
    - Super Admin can delete any record
    - Regular users cannot delete critical records
    - Audit trail for sensitive operations

5. **Data Privacy**
    - Students cannot see other students' marks
    - Parents see only their children's data
    - Teachers see only assigned class data
    - Financial data restricted to accountants

---

## System Constraints

### Technical Constraints

-   Built on Laravel 12 framework
-   Requires PHP 8.2+
-   Database: MySQL/MariaDB/PostgreSQL
-   Frontend: Blade templates with Tailwind CSS
-   Session-based authentication

### Business Constraints

-   One student can be in only one class/section at a time
-   Academic year cannot overlap
-   Cannot delete exam records with entered marks
-   Cannot modify published results (Super Admin only)
-   Payment receipts are immutable once generated

---

## Glossary

| Term                 | Definition                                            |
| -------------------- | ----------------------------------------------------- |
| **CA**               | Continuous Assessment - marks awarded during the term |
| **LGA**              | Local Government Area - administrative division       |
| **Section**          | Division within a class (e.g., Class 5A, Class 5B)    |
| **Term**             | Academic period (typically 3 terms per year)          |
| **Session**          | Academic year (e.g., 2024/2025)                       |
| **Promotion**        | Moving students to the next class level               |
| **Marksheet**        | Report card showing exam results                      |
| **Tabulation Sheet** | Consolidated class results                            |
| **RBAC**             | Role-Based Access Control                             |
| **CRUD**             | Create, Read, Update, Delete                          |

---

## Quick Reference: Who Can Do What?

### Super Admin ✓✓✓

-   ✅ Everything Admin can do
-   ✅ Delete any record
-   ✅ Manage Super Admin accounts
-   ✅ Access system logs
-   ✅ Modify published results

### Admin ✓✓

-   ✅ Manage students, teachers, staff
-   ✅ Create exams and classes
-   ✅ View all reports
-   ✅ Manage system settings
-   ✅ Post notices
-   ❌ Delete critical records
-   ❌ Create Super Admin accounts

### Teacher ✓

-   ✅ View assigned classes
-   ✅ Enter marks for assigned subjects
-   ✅ View student profiles (own classes)
-   ✅ Manage class timetable (if class teacher)
-   ❌ Access financial modules
-   ❌ Create user accounts
-   ❌ Modify student records

### Accountant ✓

-   ✅ Record payments
-   ✅ Generate receipts
-   ✅ View financial reports
-   ✅ Manage payment types
-   ❌ Access academic modules
-   ❌ View exam marks
-   ❌ Create students

### Librarian ✓

-   ✅ Manage books
-   ✅ Issue/return books
-   ✅ Calculate fines
-   ✅ View library reports
-   ❌ Access other modules

### Student 👁️

-   👁️ View own profile
-   👁️ View own marks
-   👁️ View timetable
-   👁️ View payments
-   👁️ Request library books
-   ❌ View other students' data
-   ❌ Modify marks

### Parent 👁️

-   👁️ View child's profile
-   👁️ View child's marks
-   👁️ View child's payments
-   👁️ View child's timetable
-   ❌ Modify any data
-   ❌ View other students' data

---

<div align="center">

**End of Functional Guide**

For technical setup instructions, see [README.md](README.md)

For migration information, see [MIGRATION_GUIDE.md](MIGRATION_GUIDE.md)

---

_Last Updated: November 9, 2025_

</div>
