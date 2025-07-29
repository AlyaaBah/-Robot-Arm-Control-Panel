# -Robot-Arm-Control-Panel


A dynamic web-based interface for controlling motor positions within a robotic arm system. Developed using PHP and styled with responsive HTML and CSS, this control panel allows users to set motor values, save poses to a MySQL database, and interact with simulated movement.

## Overview

This project presents an interactive user interface for managing motor angles in a robotic arm setup. Two sliders are used to control Motor 1 and Motor 2, and poses can be saved directly to a local database hosted via XAMPP. The system demonstrates principles of user-centric design, backend integration, and simulation feedback.

The interface was built as part of a modular control system, with support for future physical hardware connectivity.

## Features

- **Dual motor sliders** to adjust servo angles between 0° and 180°  
- **Save Pose** button stores current values securely using prepared statements in PHP  
- **Reset and Run controls** provide quick simulation functions  
- **Tabular pose preview** displays sample saved data for reference  
- **Styled layout** ensures intuitive interaction and clean visual hierarchy  
- **Database integration** via MySQL hosted on XAMPP  
- **Custom success page** styled to confirm saved entries with motor values  

## Technologies Used

- PHP for server-side logic and database connection  
- HTML5 and CSS3 for responsive layout and visual design  
- JavaScript for dynamic value updates and slider functionality  
- MySQL for structured pose data storage  
- XAMPP for local server and database hosting  

## Workflow Summary

- User selects motor positions using sliders  
- On form submission, values are sent to `save_pose.php` via POST  
- Data is inserted into a table named `motors` with `motor1`, `motor2`, and `ID`  
- Confirmation message displays motor values and link to return to interface  
- Stored data can be extended to power physical servos or log user interactions  

## Challenges Faced

**Ensuring accurate value submission through slider inputs**  
*Solution:* Implemented real-time value display and hidden form bindings to capture current positions.

**Managing successful database writes and user feedback**  
*Solution:* Designed a custom styled success message with a redirect button to ensure clarity and navigation.

**Preventing malformed or incomplete data entries**  
*Solution:* Applied required form fields and server-side validation through `isset()` checks and type conversion.

## Applications

- Robotic arm control for simulation or servo-based execution  
- Educational tools for teaching hardware-software integration  
- Web interfaces for embedded systems  
- Data logging platforms for robotics testing and pose capture  

## Future Enhancements

- Add live display of stored poses directly from the database  
- Integrate physical servo motors via Arduino or Raspberry Pi  
- Extend system to support multi-joint articulation and presets  
- Implement user login and session-based pose history  
- Include animation preview of movements using SVG or canvas  

## Database Structure

Table: `motors`  
Columns:
- `ID` — Auto-increment primary key  
- `motor1` — Integer value (0–180)  
- `motor2` — Integer value (0–180)  

## Repository Contents

- `index.php` — Main control panel interface  
- `save_pose.php` — Backend logic to insert poses into MySQL  
- `db_connect.php` — MySQL connection using localhost, root user, no password  
- `README.md` — Project documentation and usage notes

---

⭐ Created by Alyaa
