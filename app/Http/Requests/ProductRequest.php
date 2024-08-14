namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'], // Adjusted title length
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation with size and format limits
            'price' => ['required', 'numeric', 'min:0'], // Ensures price is numeric and non-negative
            'description' => ['nullable', 'string', 'max:5000'], // Description can have a max length of 5000
        ];
    }
}
