<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //成员信息页面
    public function index()
    {

        //$students = Student::get();
        $students = Student::paginate(10);
        //$students = Student::paginate(20);
        return view('student.index',
            [
               'students'=>$students,
            ]
        );
    }
    //添加成员页面
    public function create(Request $request){

        $student = new Student();
//        直接在当前方法调用
        if ($request->isMethod('post')){
            //1.控制器验证
            /*$this->validate($request,[
                'Student.name'=>'required|min:2|max:20',
                'Student.age'=>'required|integer',
                'Student.sex'=>'required|integer'
            ],[
                //提示用户填写信息，自定义的方式
                'required'=>':attribute为必填项',
                'min'=>':attribute长度不符合要求',
                'integer'=>':attribute必须为整数',
            ],
            [
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别',
            ]);*/
            //2.Validator验证
            $validator=\Validator::make($request->input(),[
                'Student.name'=>'required|min:2|max:20',
                'Student.age'=>'required|integer',
                'Student.sex'=>'required|integer'
            ],[
                //提示用户填写信息，自定义的方式
                'required'=>':attribute为必填项',
                'min'=>':attribute长度不符合要求',
                'integer'=>':attribute必须为整数',
            ],
                [
                    'Student.name'=>'姓名',
                    'Student.age'=>'年龄',
                    'Student.sex'=>'性别',
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
                //withInput();用于保持数据以及create的input中的value="{{old('Student')['name']}}"
            }
            $data = $request->input('Student');
            if(Student::create($data)){
                return redirect('student/index')->with('success','success to add');
            }
            else{
                return redirect()->back()->with('unsuccess','unsuccess to add');
            }
        }
        return view('student.create',[
            'student' => $student
        ]);
    }
    //保存页面
    public function save(Request $request){
        $data = $request->input('Student');
        //打印信息
        //var_dump($data);
        //保证提交信息和数据库信息列对应S：目前认为需要匹配
        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if($student->save()){
            return redirect('student/index');
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(Request $request , $id){
    $student = Student::find($id);
    if ($request->isMethod('POST')){

            $this->validate($request,[
            'Student.name'=>'required|min:2|max:20',
            'Student.age'=>'required|integer',
            'Student.sex'=>'required|integer'
        ],[
            //提示用户填写信息，自定义的方式
            'required'=>':attribute为必填项',
            'min'=>':attribute长度不符合要求',
            'integer'=>':attribute必须为整数',
        ],
            [
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别',
            ]);
        $data=$request->input('Student');
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if($student->update()){
            return redirect('student/index')->with('success','success to modify - ' . $id);
        }
       // else{
         //   return redirect()->back()->with('unsuccess','unsuccess to exchange');
      //  }
    }
    return view('student.update',[
        'student' => $student
    ]);
}
public function detail($id){
        $student =Student::find($id);
        return view('student/detail',[
            'student'=>$student
        ]);
}
public function delete($id){
    $student =Student::find($id);
    if ($student->delete()){
        return redirect('student/index')->with('success','success to delete - ' . $id);
    }
    else{
        return redirect('student/index')->with('unsuccess','unsuccess to delete - ' . $id);
    }
}
}