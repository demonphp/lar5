<?php

namespace App\Http\Controllers\Admin;


/*
 * @desc 网站配置控制器
 */

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,View,File;

class BlogConfController extends Controller
{
    protected $view_path = 'admin.blog.conf';
    protected $conf = '';
    protected $conf_path = '';

    public function __construct()
    {
        $conf = 'web_blog_conf';
        $this->conf = $conf;
        $this->conf_path = config_path() .'/'. $conf .'.php';
    }

    public function getEdit()
    {
        $res = File::exists($this->conf_path);
        if($res === true) {
            $data = \Config::get($this->conf);
        }else {
            $data = [
                'web_title' => 'demon的博客系统',
                'web_count' => '百度统计',
                'web_status' => '1',
                'seo_title' => 'demon php',
                'keywords' => 'demon,php,帅哥',
                'description' => 'demon的个人博客,请多多关注,后期会推送更多的文章',
                'copyright' => 'Design by demon <a href="http://www.demonphp.top" target="_blank">http://www.demonphp.top</a>',
            ];
        }

        return View::make($this->view_path . '.edit')->with(['data'=>$data]);
    }

    public function anySave(Request $request)
    {
        $rules = [
            'web_title'      => 'required',
            'web_count'      => 'required',
            'web_status'     => 'required',
            'seo_title'      => 'required',
            'keywords'       => 'required',
            'description'    => 'required',
            'copyright'      => 'required',
        ];

        $message = ["required"  => ":attribute 不能为空", "between" =>":attribute 长度必须在 :min 和 :max 之间"];
        $attributes = [
            'web_title'      => '网站标题',
            'web_count'      => '网站统计',
            'web_status'     => '网站状态',
            'seo_title'      => 'SEO标题',
            'keywords'       => '关键字',
            'description'    => '描述',
            'copyright'      => '版权',
        ];

        $columns = ['web_title','web_count','web_status','web_status','seo_title','keywords','description','copyright'];
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }

        $data = array_only($request->all(),$columns);

        $contents = "<?php return [";

        foreach($data as $k => $v) {
            $contents .= "'$k'=>'".$v."'," ;
        }

        $contents .= "];";

        File::put($this->conf_path, $contents);

        return success('更新成功');
    }



}