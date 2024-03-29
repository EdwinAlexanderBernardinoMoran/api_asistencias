<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\V1\Collection\StudentCollection;
use App\Http\Resources\V1\Resources\GeneratePdfStudentResources;
use App\Http\Resources\V1\Resources\StudentResource;
use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('nationality', 'departmentBirth', 'municipalityBirth', 'specialty', 'shoolCenter', 'zone', 'departmentResidence', 'municipalityResident', 'cantonResidence', 'hamletResidence', 'zoneReponsible', 'departmentReponsible', 'municipalityReponsible', 'cantonReponsible', 'hamletReponsible', 'teacher', 'attendances', 'registrations')->latest()->paginate();
        return new StudentCollection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return response()->json([
            'message' => '¡Alumno Creado Exitosamente!'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return response()->json([
            'message' => 'Alumno Actualizado!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Alumno Eliminado'
        ], Response::HTTP_NO_CONTENT);
    }

    public function generatePdf(Student $student){
        return new GeneratePdfStudentResources($student);
    }
}
