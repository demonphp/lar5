<?php
    if (!function_exists('recursion_sort'))
    {
        /*
         * 无限级分类
         * @param1 array $categories，要分类的二维数组
         * @param2 string $idKey = 'id'，主键id
         * @param2 string $fidKey = 'pid'，父级id
         * @param2 int $parent_id = 0，要找的分类的
         * @param3 int $lev = 0，当前分类所属的层级
         * @param4 int $stop_id = -1，不需要分类的id
         * @return 一个进行分类好的二维数组
         */
        function recursion_sort($arr,$idKey ='id',$fidKey = 'pid',$root_id = 0,$lev=1,$stop_id = -1) {
            static $list = array();     //子函数中要共用
            foreach($arr as $v) {
                if($v[$fidKey] == $root_id && $v[$idKey] != $stop_id) {
                    //符合当前层级：将当前层级属性加到对应的分类中
                    $v['lev'] = $lev;
                    //符合条件
                    $list[] = $v;
                    //递归点：$category有可能还有自己的子分类
                    $function_name =  __FUNCTION__;
                    $function_name($arr,$idKey,$fidKey,$v['id'],$lev+1,$stop_id);
                }
            }
            //递归出口：数组遍历结束也没碰到合适的
            //返回对应的数组
            return $list;
        }
    }

    if (! function_exists('success')) {
        /**
         * @dsec 返回成功的json数组
         * @param  string $msg
         * @return mixed
         */
        function success($msg = 'ok')
        {
            $result = [
                'message' => $msg,
                'statusCode' => 200,
            ];
            return Response::json($result);
        }
    }

    if (! function_exists('error')) {
        /**
         * @dsec 返回成功的json数组
         * @param  string $msg
         * @return mixed
         */
        function error($msg = 'ok')
        {
            $result = [
                'message' => $msg,
                'statusCode' => 300,
            ];
            return Response::json($result);
        }
    }

    /**
     * 返回可读性更好的文件尺寸
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
    }

    /**
     * 判断文件的MIME类型是否为图片
     */
    function is_image($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }

