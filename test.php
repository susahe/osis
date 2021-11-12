
<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$10$4P4I9lwNkvDU/hVfV0HGyuYI8oWLI.ekogC7';

if (password_verify('123456', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
