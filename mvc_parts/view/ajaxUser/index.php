<?php
$output = '';
if ($this->validData) {
    $output .= '<tbody>';
    foreach ($this->user as $e) {
        $output .= '<tr><td class="col-sm-3">' . $e->getFirstname() . '</td>';
        $output .= '<td class="col-sm-3">' . $e->getLastname() . '</td>';
        $output .= '<td class="col-sm-2">' . $this->genderNames[$e->getGender()] . '</td>';
        $output .= '<td class="col-sm-4">' . $e->getEmail() . '</td>';
        $output .= '</tr>';
    }
    $output .= '</tbody>';
}
echo $output;