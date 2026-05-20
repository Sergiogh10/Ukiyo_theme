import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { SummaryBox } from '../components/SummaryBox';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockTripData } from '../data/mockData';

interface TravelPreparationEmailProps extends CommonEmailProps {
  destination?: string;
}

export const TravelPreparationEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  destination = mockTripData.destination,
}: TravelPreparationEmailProps) => {
  const previewText = 'Empieza a preparar tu viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Se va acercando el momento de empezar a pensar en las maletas y en los preparativos de tu viaje a {destination}. Qué momento tan especial del viaje es la antesala de la partida.
          </Paragraph>
          <Paragraph>
            Queremos que llegues sin estrés, así que nos hemos adelantado a recopilar algunas notas que pueden venirte muy bien para irte organizando con calma.
          </Paragraph>

          <SummaryBox>
            <SectionTitle as="h3" style={{ marginTop: '0' }}>El clima y qué llevar</SectionTitle>
            <Paragraph>
              A pesar de que el clima suele ser agradable, recomendamos meter algunas capas. Por la noche suele refrescar un poco, y además te vendrá bien llevar prendas que resulten versátiles. Valora llevarte calzado cómodo al que ya estés acostumbrado; vamos a caminar mucho para vivir el destino de cerca.
            </Paragraph>

            <SectionTitle as="h3">Documentación esencial</SectionTitle>
            <Paragraph style={{ marginBottom: '0' }}>
              Nosotros gestionaremos gran parte, pero asegúrate de que tu pasaporte tiene suficiente vigencia y de ir revisando tu cartilla de vacunación internacional si aplica. En los próximos días os enviaremos la carpeta definitiva con todo dentro.
            </Paragraph>
          </SummaryBox>

          <Paragraph>
            Es el momento de leer, inspirarse y dejar que las expectativas vayan creciendo de forma natural. Cualquier duda logística que te asalte estos días, mándanosla para que la reservemos.
          </Paragraph>

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default TravelPreparationEmail;
