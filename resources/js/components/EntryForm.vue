<template>
  <div id="entry-form">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <template v-if="responseHasMessage">
          <div v-if="responseHasErrors" class="alert alert-danger">
            <p><strong>{{ response.message }}</strong></p>
            <ul>
              <li v-for="(error,index) in response.errors" :key="index">
                {{ error[0] }}
              </li>
            </ul>
          </div>
          <div v-else class="alert alert-success">
            <strong>{{ response.message }}</strong>
          </div>
        </template>
        <div class="card">
          <div class="card-header">
            Entry Form
            <Spinner v-show="isDisabled" />
          </div>
          <div class="card-body">
            <form @submit.prevent="onSubmit">
              <fieldset :disabled="isDisabled">
                <div class="form-group">
                  <label for="drawings_or_paye">Are you taking Drawings Or Paye?</label>
                  <select v-model="model.drawings_or_paye" class="form-control" name="drawings_or_paye" id="drawings_or_paye">
                    <option value=""></option>
                    <option>Drawings/Shareholder salary (i.e non paye income)</option>
                    <option>PAYE</option>
                    <option>Combination of Drawings/Shareholder salary (i.e non paye income) and PAYE</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="is_more_than_three_years">Been in business for more than 3 years?</label>
                  <select v-model="model.is_more_than_three_years" class="form-control" name="is_more_than_three_years" id="is_more_than_three_years">
                    <option value=""></option>
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="years_in_business">How many years?</label>
                  <input v-model="model.years_in_business" type="number" class="form-control" name="years_in_business" id="years_in_business" />
                </div>
                <div class="form-group">
                  <label for="work_type">Working full time?</label>
                  <select v-model="model.work_type" class="form-control" name="work_type" id="work_type">
                    <option value=""></option>
                    <option>Full Time</option>
                    <option>Part Time</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="number_of_staff">How many staff do you have working for you?</label>
                  <input v-model="model.number_of_staff" type="number" class="form-control" name="number_of_staff" id="number_of_staff" />
                </div>
                <div class="form-group">
                  <label for="on_tools">Now, are you on tools?</label>
                  <select v-model="model.on_tools" class="form-control" name="on_tools" id="on_tools">
                    <option value=""></option>
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="other_not_on_tools">Is there any other shareholders/director that are not on the tools?</label>
                  <select v-model="model.other_not_on_tools" class="form-control" name="other_not_on_tools" id="other_not_on_tools">
                    <option value=""></option>
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="income">How much income did you take out last year from the business?</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input v-model="model.income" type="number" class="form-control" name="income" id="income" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment_frequency">Payment Frequency</label>
                  <select v-model="model.payment_frequency" class="form-control" name="payment_frequency" id="payment_frequency">
                    <option value=""></option>
                    <option>Weekly</option>
                    <option>Fornightly</option>
                    <option>Monthly</option>
                    <option>Annually</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="acc_cover_plan">What ACC cover plan do you have?</label>
                  <select v-model="model.acc_cover_plan" class="form-control" name="acc_cover_plan" id="acc_cover_plan">
                    <option value=""></option>
                    <option>ACC Cover Plus/Work Place Cover</option>
                    <option>ACC Cover Plus Extra</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="cover_plus_extra_cover_amount">Your nominated Cover Plus Extra cover amount?</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input v-model="model.cover_plus_extra_cover_amount" type="text" class="form-control" name="cover_plus_extra_cover_amount" id="cover_plus_extra_cover_amount" />
                  </div>
                </div>
                <button class="btn btn-primary btn-lg" type="submit">
                  Submit 
                  <Spinner v-show="isDisabled" />
                </button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Spinner from './Spinner';

const RESPONSE_DEFAULTS = {
  message: '',
  errors: {}
};

export default {
  data() {
    return {
      isDisabled: false,
      response: {
        ...RESPONSE_DEFAULTS
      },
      /* values below are declared in blade file */
      formURL: FORM_URL,
      method: METHOD,
      mode: MODE, // edit or create
      model: {
        ...MODEL_DEFAULTS // default form values
      }
    }
  },
  components: {
    Spinner
  },
  computed: {
    responseHasMessage() {
      return this.response.message !== '';
    },
    responseHasErrors() {
      return Object.keys(this.response.errors).length > 0;
    }
  },
  methods: {
    onSubmit(event) {
      this.isDisabled = true;
      this.response = { ...RESPONSE_DEFAULTS };
      
      const formData = new FormData(event.target);

      axios({
        data: formData,
        method: this.method,
        url: this.formURL,
      }).then(resp => {
        this.response.message = resp.data.message;
        if (this.mode === 'CREATE') {
          this.model = { ...MODEL_DEFAULTS };
        }
      }).catch(error => {
        this.response.message = error.response.data.message;
        this.response.errors = error.response.data.errors;
      }).finally(_ => {
        this.isDisabled = false;
        document.body.scrollTop = document.documentElement.scrollTop = 0;
      });
    }
  }
}
</script>