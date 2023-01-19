<form
	method="post"
	action="javascript:void(0);"
	class="form"
>
	<div class="form__row">
		<div class="form__field">
			<label for="calendar-start-date">Date</label>
			<input type="text" name="calendar-start-date" id="calendar-start-date" />
		</div>
		<div class="form__field">
			<label for="calendar-start-time">Time</label>
			<select name="calendar-start-time" id="calendar-start-time" disabled>
			</select>
		</div>
	</div>

	<div class="form__field">
		<label for="calendar-message">Message</label>
		<textarea name="calendar-message" id="calendar-message"></textarea>
	</div>

	<div class="form__row">
		<div class="form__field">
			<label for="calendar-contact-method">Contact you by</label>
			<select name="calendar-contact-method" id="calendar-contact-method">
				<option>WhatsApp</option>
				<option>Email</option>
			</select>
		</div>
		<div class="form__field">
			<label for="calendar-contact-value">Phone number</label>
			<input type="tel" name="calendar-contact-value" id="calendar-contact-value" />
		</div>
	</div>

    <button type="button" class="form__button">Send</button>

</form>