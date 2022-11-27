<form
	method="post"
	action="javascript:void(0);"
	class="form contact"
>
	<div class="form__field">
		<label for="contact_name">Nome</label>
		<input type="text" name="contact_name" required />
	</div>
	<div class="form__row">
		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="email" name="contact_email" required />
		</div>
		<div class="form__field">
			<label for="tel">Telefone</label>
			<input type="tel" name="contact_tel" required />
		</div>
	</div>
	<div class="form__field contact__message">
		<label for="message" class="visually-hidden">Mensagem</label>
		<textarea name="message" rows="6" required></textarea>
	</div>
	<button type="submit" class="form__button">Send</button>
</form>