<?php
require("./src/config/app.php");
$app = config();
require $app["template"] . "header.php";
?>

<script src="<?= $app['src']['js'] . 'http.js' ?>"></script>
<script>
	const formData = new FormData;
	formData.append("name", "Lucky");
	formData.append("job", "Designer");
	http
		.post("<?= baseUrl() . '/src/actions/art/tes.php' ?>", formData)
		.then(response => {
			if(response.code >= 500) {
				throw new Error(response.error);
				return;
			}

			console.log(response);
		})
		.catch(err => console.log(err))
</script>

<?php require $app["template"] . "footer.php"; ?>