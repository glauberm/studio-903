<form
	method="post"
	action="javascript:void(0);"
	class="form"
>
	<div class="form__row">
		<div class="form__field">
			<label for="calendar-date">Date</label>
			<select name="calendar-date" id="calendar-date">
                <option>01/02</option>
                <option>02/02</option>
                <option>03/02</option>
                <option>04/02</option>
                <option>06/02</option>
                <option>07/02</option>
                <option>08/02</option>
                <option>09/02</option>
                <option>10/02</option>
                <option>11/02</option>
                <option>13/02</option>
                <option>14/02</option>
                <option>15/02</option>
                <option>16/02</option>
                <option>17/02</option>
                <option>18/02</option>
                <option>20/02</option>
                <option>21/02</option>
                <option>22/02</option>
                <option>23/02</option>
                <option>24/02</option>
                <option>25/02</option>
                <option>27/02</option>
                <option>28/02</option>
                <option>01/03</option>
                <option>02/03</option>
			</select>
		</div>
		<div class="form__field">
			<label for="calendar-time">Time</label>
			<select name="calendar-time" id="calendar-time" disabled>
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