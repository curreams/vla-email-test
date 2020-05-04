<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\EmailTemplate;
use Exception;

class TemplatesController extends Controller
{

    /**
     * Display a listing of the templates.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        $templates = Template::paginate(25);

        return view('templates.index', compact('templates'));
    }

    public function getTemplateList()
    {
        $client = new \GuzzleHttp\Client();
        $templates = [];
        return view('templates.send', compact('templates'));
    }

    public function searchTemplates(Request $request)
    {
        $name = $request->search;
        $client = new \GuzzleHttp\Client();
        $templates = [];//Template::all();
        $response = $client->request('GET', 'https://vladev.appiancloud.com/suite/webapi/getEmailTemplate?startIndex=1&batchSize=4&name=' . $name, [
            'headers' => [
                env('API_KEY_NAME', 'user') => env('API_KEY', 'not-the-key')
            ]
        ]);
        $templates= json_decode($response->getBody(), true);
        return view('templates.send', compact('templates'));
    }

    public function sendEmail(Request $request)
    {
        try {

            $templates = $request->templates;
            $email_addresses = explode(";",$request->email_addresses);
            foreach ($templates as $template) {
                $template = json_decode($template, true);

                $email_data['subject'] = $template["name"];
                $email_data['message'] = $template["template"];
                $email_data['from'] = env('MAIL_FROM_ADDRESS', 'Test@example.com');
                foreach ($email_addresses as $email_address) {
                    Mail::to(trim($email_address))->send(new EmailTemplate($email_data));
                }
            }
            return redirect()->route('templates.template.getTemplateList')
            ->with('success_message', 'Email(s) sent successfully.');


        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Show the form for creating a new template.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        return view('templates.create');
    }

    /**
     * Store a new template in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Template::create($data);

            return redirect()->route('templates.template.index')
                ->with('success_message', 'Template was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified template.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $template = Template::findOrFail($id);

        return view('templates.show', compact('template'));
    }

    /**
     * Show the form for editing the specified template.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        

        return view('templates.edit', compact('template'));
    }

    /**
     * Update the specified template in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $template = Template::findOrFail($id);
            $template->update($data);

            return redirect()->route('templates.template.index')
                ->with('success_message', 'Template was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified template from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $template = Template::findOrFail($id);
            $template->delete();

            return redirect()->route('templates.template.index')
                ->with('success_message', 'Template was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'VIT_TEMPLATE_NAME' => 'string|min:1|max:255|nullable',
            'VIT_SECTION' => 'string|min:1|nullable',
            'VIT_SUBJECT' => 'string|min:1|max:255|nullable',
            'VIT_TEMPLATE' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
