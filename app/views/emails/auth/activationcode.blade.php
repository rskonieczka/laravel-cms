<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Activation code</h2>

		<div>
		    Thank you for signup to our website!<br />
		    Your login: {{ $email }}<br />
		    Your password: {{ $password }}<br /><br />
			To activate your account go to: {{ URL::to('auth/activate/'.$email.'/'.$activationCode) }}.
		</div>
	</body>
</html>
