package Number;
import java.util.Random;
import java.util.Scanner;
public class NumberGaming{

	public static void main(String[] args) {
		Scanner obj = new Scanner(System.in);
		Random random = new Random();
		
		int totalRounds = 0;
		int roundswon =0;
		
		while(true) {
			int targetnumber = random.nextInt(100) + 1 ;
			int attempts =0;
			int maxAttempts =10;
			
			boolean guessedCorrectly = false;
			
			System.out.println("Welcome to the Number Guessing Game!");
            System.out.println("I have generated a Random Number Between 1 and 100. You have 10 attempts to guess it.");
            
            
          while(attempts < maxAttempts && !guessedCorrectly) {
        	  System.out.print("Attempt " + (attempts + 1) + "/" + maxAttempts + ". Enter your guess: ");
              int guess = obj.nextInt();
              attempts=attempts+1;
              
              if(guess < targetnumber) {
            	  System.out.println("Too Law Try Agin");
              }else if(guess >targetnumber) {
            	  System.out.println("Too high Try Agin");
              }else {
            	  guessedCorrectly = true;
                  System.out.println("Congratulations! You've guessed the correct number " + targetnumber + " in " + attempts + " attempts.");
              }
              if (!guessedCorrectly) {
                  System.out.println("Sorry, you've used all your attempts. The correct number was " + targetnumber + ".");
              }
         
              totalRounds++;
              System.out.print("Would you like to play again? (yes/no): ");
              String playAgain =obj.next().toLowerCase();
              
              if (playAgain.equals("yes")) {
                  roundswon++;
              } else {
                  break;
              }
          }
          
          // Display user's score
          System.out.println("\nYou played " + totalRounds + " rounds and won " + roundswon + " round(s).");
          System.out.println("Thanks for playing!");
          
          obj.close();
      }
  }
}
