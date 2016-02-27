#include <stdio.h>
#include <sys/time.h>
int main (void)
{
	 struct timeval inicio, final;
   int tmili;
 	 gettimeofday(&inicio, NULL);
   int totalIterations = 1000000;
   long number;
   int size;
   int higherNumber = 1;
   int positionHigherNumber = 1;
	 int i;
   for (i=1; i <= totalIterations; i++){
		   // 113383
      number = i;
      size = 1;
      while(number!=1){
        if(number%2 == 0){
          number = number/2;
        }else{
          number = number*3 + 1;
        }
          size++;
        }
        if(size > higherNumber){
          higherNumber = size;
          positionHigherNumber = i;
        }
   }
	 gettimeofday(&final, NULL);
   tmili = (int) (1000.0 * (final.tv_sec - inicio.tv_sec) + (final.tv_usec - inicio.tv_usec) / 1000.0);
	 printf("%d\n", tmili);
	 printf("O número inteiro positivo abaixo de 1 milhao que produz a sequencia com mais elementos é o número:\n%d, com %d elementos.\n",
			positionHigherNumber, higherNumber);
}
