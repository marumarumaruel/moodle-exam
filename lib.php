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

function local_course_completion_status_before_footer() {
  //echo "Hello!";
  //\core\notification::add('Success!',\core\output\notification::NOTIFY_SUCCESS);
}

// defined('MOODLE_INTERNAL') || die;
// $navigation->add('reports', new admin_externalpage('course_completion_status', 'Course Completion Status', "/local/course_completion_status/index.php"));
// $settings = null;

function local_course_completion_status_extend_settings_navigation($settingsnav, $context) {
  global $CFG, $PAGE;

  if ($settingnode = $settingsnav->find('coursereports', navigation_node::TYPE_CONTAINER)) {
      $strfoo = get_string('course_completion_status', 'local_course_completion_status');
      $url = new moodle_url('/local/course_completion_status/index.php', array('id' => $PAGE->course->id));
      $foonode = navigation_node::create(
          $strfoo,
          $url,
          navigation_node::NODETYPE_LEAF,
          'course_completion_status',
          'course_completion_status',
          new pix_icon('t/addcontact', $strfoo)
      );
      if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
          $foonode->make_active();
      }
      $settingnode->add_node($foonode);
  }
}
