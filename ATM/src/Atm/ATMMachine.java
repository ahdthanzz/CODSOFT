
package Atm;
import java.util.Scanner;
class BankAccount {
    private double balance;
    public BankAccount(double initialBalance) {
        this.balance = initialBalance;
    }
    public double getBalance() {
        return balance;
    }
    public void deposit(double amount) {
        if (amount > 0) {
            balance += amount;
            System.out.println("Deposit successful. New balance: " + balance);
        } else {
            System.out.println("Invalid deposit amount.");
        }
    }
    public void withdraw(double amount) {
        if (amount > 0 && amount <= balance) {
            balance -= amount;
            System.out.println("Withdrawal successful. New balance: " + balance);
        } else {
            System.out.println("Invalid withdrawal amount.");
        }
    }
}
class ATM {
    private BankAccount account;
    private Scanner obj;
    public ATM(BankAccount account) {
        this.account = account;
        this.obj = new Scanner(System.in);
    }
    public void start() {
        while (true) {
            System.out.println("=== ATM MENU === ");
            
            System.out.println("1. Check Balance");
            System.out.println("2. Deposit");
            System.out.println("3. Withdraw");
            System.out.println("4. Exit");
            System.out.print("Choose an option: ");
            int choice = obj.nextInt();
            switch (choice) {
                case 1:
                    System.out.println("Your balance: " + account.getBalance());
                    break;
                case 2:
                    System.out.print("Enter deposit amount:- ");
                    double depositAmount = obj.nextDouble();
                    account.deposit(depositAmount);
                    break;
                case 3:
                    System.out.print("Enter withdrawal amount:- ");
                    double withdrawAmount = obj.nextDouble();
                    account.withdraw(withdrawAmount);
                    break;
                case 4:
                    System.out.println("!!Thank you for using the ATM. Goodbye!!");
                    return;
                default:
                    System.out.println("Invalid choice. Please try again.");
            }
        }
    }
}
public class ATMMachine {
    public static void main(String[] args) {
        BankAccount userAccount = new BankAccount(150000);
        ATM atm= new ATM(userAccount);
        atm.start();
    }
}
