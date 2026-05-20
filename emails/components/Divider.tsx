import { Hr } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface DividerProps {
  style?: React.CSSProperties;
}

export const Divider = ({ style }: DividerProps) => {
  return (
    <Hr style={{ ...dividerStyle, ...style }} />
  );
};

const dividerStyle = {
  borderColor: theme.colors.border,
  borderWidth: '1px',
  margin: '32px 0',
  width: '100%',
};

export default Divider;
