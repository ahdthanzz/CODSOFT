package Student;
import java.util.Scanner;

	public class StudentCalculator {
	    public static void main(String[] args) {
	        Scanner obj = new Scanner(System.in);

	        System.out.print("== Enter the number of subjects :== ");
	        int numSubjects = obj.nextInt();
	        
	        int totalMarks = 0;

	        for (int i = 1; i <= numSubjects; i++) {
	            System.out.print("Enter marks obtained in Subject " + i + " (out of 100): ");
	            int marks = obj.nextInt();
	            while (marks < 0 || marks > 100) {
	                System.out.print("Invalid marks! Enter again (0-100): ");
	                marks = obj.nextInt();
	            }

	            totalMarks += marks;
	        }
	        double averagePercentage = (double) totalMarks / numSubjects;
	        char grade;
	        if (averagePercentage >= 90) {
	            grade = 'A';
	        } else if (averagePercentage >= 80) {
	            grade = 'B';
	        } else if (averagePercentage >= 70) {
	            grade = 'C';
	        } else if (averagePercentage >= 60) {
	            grade = 'D';
	        } else {
	            grade = 'F';
	        }
	        System.out.println("====== Student Result =====");
	        
	        System.out.println("Total Marks:- " + totalMarks + " / " + (numSubjects * 100));
	        System.out.println("Average Percentage:- " + averagePercentage + "%");
	        System.out.println("Grade:- " + grade);
	        System.out.println("!!!Thank You For Using Calculator !!!");

	        obj.close();
	    }
	}