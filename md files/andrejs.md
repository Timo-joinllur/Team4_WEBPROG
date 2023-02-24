Accounts should pass two parameters with session: id and account type: admin/not
$_SESSION['user'] = 'id';
$_SESSION['usertype'] = 'admin';

after initializing session_start(); with empty user id, it will provide website interface(e.g. regular prices) for unregistered users,
with user id,but without admin privileges for registered user (e.g. giving a comment/making reservation), for user with id and admin righths website interface will be structed differently: editing options/comment approval, special page to see reservations.

It is better to implement coockies alongside with session: on start checking for coockies presence, if present - start session, if not, wait until login is done and then start it.

login/logout/edit profile/create an account can be done in one page or implemented to many, but opened from same button, depending on session's status