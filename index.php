<?php
// This file is part of Course Completion Status Plugin
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     local_course_completion_status
 * @author      Maru
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin
 */

require_once(__DIR__ . '/../../config.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/course_completion_status/index.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Course Completion Status');

echo $OUTPUT->header();

$courseID = optional_param('id', 0, PARAM_INT);
$contextCourse = context_course::instance($courseID);
$enrolledUsers = get_enrolled_users($contextCourse);

echo "Users enrolled:<br />";
foreach($enrolledUsers as $enrolledUser)
{
  echo $enrolledUser->firstname." ".$enrolledUser->lastname."<br />";
}

echo $OUTPUT->footer();
